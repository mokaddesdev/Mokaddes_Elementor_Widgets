<?php
/**
 * Image Slider Widget
 * 
 * @package mea
 */

class MEA_Image_Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'mea_image_slider';
    }

    public function get_title() {
        return esc_html__( 'MEA Image Slider', 'mea' );
    }

    public function get_icon() {
        return 'eicon-slider-device';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'carousel' ];
    }

    public function get_script_depends(): array {
        return [ 'swiper-js', 'mea-image-slider-js' ];
    }

    public function get_style_depends(): array {
        return [ 'swiper-css', 'mea-image-slider-css' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'images_slider',
            [
                'label' => esc_html__( 'Image Slider', 'mea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => esc_html__( 'Choose Image', 'mea' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_slider_list',
            [
                'label'       => esc_html__( 'Slider Items', 'mea' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ image.url }}}',
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Navigation Icon', 'mea' ),
                'type'  => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ( empty( $settings['image_slider_list'] ) ) {
            return;
        }
        ?>

        <div class="mea-image-slider swiper">
            <div class="swiper-wrapper">

                <?php foreach ( $settings['image_slider_list'] as $item ) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="">
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <?php
    }
}