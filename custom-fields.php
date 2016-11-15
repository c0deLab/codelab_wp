<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_user-info',
		'title' => 'User Info',
		'fields' => array (
			array (
				'key' => 'field_581a29817c262',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'select',
				'choices' => array (
					'faculty' => 'Faculty',
					'student' => 'Student',
					'alumni' => 'Alumni'
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_581a29ac3f3bf',
				'label' => 'Graduation Year',
				'name' => 'graduation_year',
				'type' => 'text',
				'instructions' => 'Full four digits, please',
				'default_value' => '',
				'placeholder' => '20__',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_581a29c977924',
				'label' => 'Program',
				'name' => 'program',
				'type' => 'select',
				'choices' => array (
					'mscd' => 'MSCD',
					'mtid' => 'MTID',
					'em2' => 'EM2',
					'hci' => 'HCI',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 1,
			),
			array (
				'key' => 'field_582b3ce39f7c4',
				'label' => 'Photo',
				'name' => 'photo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
