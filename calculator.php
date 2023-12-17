<?php

/*
Plugin Name: Calculator custom
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: micha
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

class MyCalculatorPlugin
{
	public function __construct()
	{
		$this->init();
	}
	
	public function init()
	{
		add_action('wp_head', array($this, 'modify_tailwindcss_url'), 10, 2);
		add_action('wp_enqueue_scripts', array($this, 'callback_for_setting_up_scripts'));
		add_shortcode('wp_calculator_loaded_custom', array($this, 'calculator_loaded_custom'));
	}
	
	public function calculator_loaded_custom()
	{
		?>
		<form action="#" method="post" enctype="multipart/form-data" id="form">
			<div class="container bg-black text-[#bfada1] max-w-[20rem]">
				<div class="relative">
					<label for="result" id="result-label" class="text-[#4a5045] text-right"></label>
					<textarea
							 class="pt-[3rem] text-[2rem] pb-[6rem] px-10 w-full bg-black text-right border-none resize-none"
							 name="result" id="result" cols="20" rows="10" oninput="validWords(event)" disabled></textarea>
				</div>
				<hr class="w-100 border-b-0 border-t-[0.04px] border-[#101010] py-2">
				<div class="grid grid-cols-4 gap-4 px-3">
					<label>
						<button id="del" type="button" value="C"
						        class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl text-[#e03a32]">
							C
						</button>
					</label>
					<div></div>
					<div></div>
					<label>
						<button id="division" type="button" value="&#xF7;"
						        class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-4xl">
							&#xF7;
						</button>
					</label>
				</div>
				<div class="grid grid-cols-4 gap-4 px-3 py-2">
					<label>
						<button type="button" value="7" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							7
						</button>
					</label>
					<label>
						<button type="button" value="8" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							8
						</button>
					</label>
					<label>
						<button type="button" value="9" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							9
						</button>
					</label>
					<label>
						<button id="multiply" type="button" value="X"
						        class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							X
						</button>
					</label>
				</div>
				<div class="grid grid-cols-4 gap-4 px-3 py-2">
					<label>
						<button type="button" value="4" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							4
						</button>
					</label>
					<label>
						<button type="button" value="5" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							5
						</button>
					</label>
					<label>
						<button type="button" value="6" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							6
						</button>
					</label>
					<label>
						<button id="substract" type="button" value="-"
						        class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-4xl">
							-
						</button>
					</label>
				</div>
				<div class="grid grid-cols-4 gap-4 px-3 py-2">
					<label>
						<button type="button" value="1" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							1
						</button>
					</label>
					<label>
						<button type="button" value="2" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							2
						</button>
					</label>
					<label>
						<button type="button" value="3" class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-xl">
							3
						</button>
					</label>
					<label>
						<button id="plus" type="button" value="+"
						        class="global bg-[#1a1a1a] h-[4rem] w-[4rem] rounded-full text-4xl">
							+
						</button>
					</label>
				</div>
				<div class="grid grid-cols-4 gap-4 px-3 py-2">
					<div></div>
					<label>
						<button type="button" value="0" class="global rounded-full text-xl big bg-[#1a1a1a] h-[4rem] w-[4rem]">
							0
						</button>
					</label>
					<div></div>
					<label>
						<button type="button" id="calculate"
						        class="bg-[#6e5948] rounded-full text-4xl text-[#e9e5df] h-[4rem] w-[4rem]">
							=
						</button>
					</label>
				</div>
			</div>
		</form>
		<?php
	}
	
	public function modify_tailwindcss_url()
	{
		?>
		<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
		<!--		don't accept words only numbers you can write-->
		<!--		try catch if you change code example:-->
		<!--		elem.value = null; then you will see error catched in cls "can't access lexical declaration 'elem' before initialization"-->
		<script>
			let result = document.querySelector('#result');
			result.value = '';
			result.innerHTML = '';
			
			function validWords(event) {
				const elem = event.target;
				const value = elem.value;
				elem.value = value.replace(/\D/, "");
			}
		</script>
		<?php
	}
	
	public function callback_for_setting_up_scripts()
	{
		wp_register_style('style_namespace', plugins_url('dist/app.min.css', __FILE__));
		wp_enqueue_style('style_namespace');
		wp_register_script('js_namespace', plugins_url('dist/main.js', __FILE__));
		wp_enqueue_script('js_namespace');
	}
}

new MyCalculatorPlugin();