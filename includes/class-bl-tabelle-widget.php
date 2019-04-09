<?php
class BL_Tabelle_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'bl-tabelle-widget',
			esc_html__('Bundesliga Tabelle', 'text-domain'),
			array( 'description' => esc_html__( 'Die aktuelle Tabelle der Bundesliga', 'text_domain' ), )
		);
	}
	public function widget( $args, $instance ) {
        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        $saison = ! empty( $instance['number'] ) ? $instance['number'] : 2018;

        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/bl-tabelle-public-display.php';
        /*** END ***/
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Bundesliga', 'text_domain' );
        $saison = ! empty( $instance['number'] ) ? $instance['number'] : esc_html__( '2018', 'text_domain' );
        ?>
         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Überschrift:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( 'Saison:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $saison ); ?>">
        </p>
        <?php
    }
 
    /**
     * Abfangen von Eingaben vor dem Speichern der Widgetparameter.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : 10;
        return $instance;
    }
}
?>