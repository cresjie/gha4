<?php

return [
	'profile_img' => [
		'link' => 'http://localhost/gha4/uploads/profile_img',
		'path' => base_path('../uploads/profile_img'),
		'sizes' => [
			/**
			 * SizeName => SizeInfo
			 */
			'50x50' => [
					'width' => '50',
					'directory' => '50x50'	
				],
			'100x100' => [
					'width' => '100',
					'directory' => '100x100'	
				],
			'200x200' => [
					'width' => '200',
					'directory' => '200x200'	
				],
			'300x300' => [
					'width' => '300',
					'directory' => '300x300'	
				],
			
			'original' => [
					'width' => null,
					'directory' => 'original'	
				]
		]
	]
];