<?php
/**
 * Image Slider
 * 
 * @package mea
 */
class MEA_Image_Slider extends \Elementor\Widget_Base{
    public function get_name()
    {
        return 'image_slider';
    }

    public function get_title()
    {
        return esc_html__( 'Image Slider', 'mea' );
    }

    public function get_icon()
    {
        return 'eicon-slider-device';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['slider'];
    }

    public function get_script_depends(): array {
		return [ 'image-slider-js' ];
	}

	public function get_style_depends(): array {
		return [ 'service-css' ];
	}

    protected function register_controls()
    {
        $repeater = new \Elementor\Repeater();
        $this->start_controls_section(
            'images_slider',
			[
				'label' => esc_html__( 'Image Slider', 'mea' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			],
        );

        $this->add_control(
			'image_slider_list',
			[
				'label' => esc_html__( ' Image Slider List', 'mea' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    'name' => 'image',
				    'label' => esc_html__( 'Choose Image', 'mea' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
				],
				'default' => [
					[
					'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="mea-image-slider">
<?php foreach ( $settings['image_slider_list'] as $item ) : ?>
    <div class="slider-item">
        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="">
    </div>
<?php endforeach; ?>
</div>
<?php
    }
}
?>