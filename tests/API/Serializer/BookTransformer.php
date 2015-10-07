<?php
namespace Solvire\API\Serializers;

use League\Fractal;

class BookTransformer extends Fractal\TransformerAbstract
{
	public function transform(TestBook $book)
	{
	    return [
	        'id'      => (int) $book->id,
	        'title'   => $book->title,
	        'yr'    => (int) $book->year,
            'link'   => 'http://test.com'
            ];
	}
}
