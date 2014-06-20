<?php

class Post extends Eloquent {

	/**
	 * Enable soft deletes
	 */
	protected $softDelete = true;

	/**
	 * Set fillable fields
	 */
	protected $fillable = array('title', 'content');

	/**
	 * Set rules
	 */
	public static $rules = array(
		'title'   => 'required',
		'content' => 'required'
	);

	/**
	 * A post belongs to a user
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}