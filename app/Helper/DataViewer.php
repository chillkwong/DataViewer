<?php
namespace App\Helper;

use Validator;

trait DataViewer{

	protected $supplierMarkFactor = 7.81 * 1.15;
	protected $operators = [
		'equal' =>'=',
		'not_equal' => '<>',
		'less_than' => '<',
		'greater_than' => '>',
		'less_than_or_equal_to' => '<=',
		'greater_than_or_equal_to' =>'>=',
		'in' =>'IN',
		'like' => 'LIKE'
		];

	protected $search_conditions=[
		'color' => [''],
		];

	public function scopeSearchPaginateAndOrder($query)
	{
		// request() = app()->make(request()');
		// // dd(request());
		$v = Validator::make(request()->only([
			'column', 'direction', 'per_page', 
			'search_column', 'search_operator', 'search_input'
			]), [
			'column' => 'required | alpha_dash | in:' . implode(',' , self::$columns),
			'direction' => 'required | in:asc,desc',
			'per_page' => 'integer | min:1',
			'search_column' =>'required | alpha_dash | in:' . implode(',' , self::$columns),
			'search_operator' => 'required | alpha_dash | in:' . implode(',' , array_keys($this->operators)),
			'search_input' => 'max:255'
			]);

		if($v->fails()){
			dd($v->messages());
		}

		return  $query
			->orderBy(request()->column, request()->direction)
			->where(function($query){
				$this->hasSearchInput($query);
			})
			->whereBetween(self::$columns[1], explode(',', request()->price))
			->whereBetween(self::$columns[5], explode(',', request()->weight))
			->paginate(request()->per_page);

	}

	protected function hasSearchInput($query)
	{
		if(request()->has('search_input')) {
					if (request()->search_operator == 'in') {
						$query->whereIn(request()->search_column, explode(',', request()->search_input));
					}else if (request()->search_operator == 'like') {
						$query->where(request()->search_column, 'LIKE', '%'.request()->search_input.'%');
					}else
					{ $query->where(request()->search_column, $this->operators[request()->search_operator], request()->search_input);}
				};

		if (request()->has(request('search_conditions'))) {
			
			
			$query->whereIn('color', explode(',', request()->color))
				->whereIn('clarity', explode(',', request()->clarity))
				->whereIn('cut', explode(',', request()->cut));
		}
	}


}