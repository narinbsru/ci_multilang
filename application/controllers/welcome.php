<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->library('googlemaps');

        $config['map_width'] = '600';
        $config['adsense'] = TRUE;
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        $marker = array();
        //$marker['position'] = '37.429, -122.1519';
        //$marker['infowindow_content'] = '<strong>Test Condo</strong><p>Description</p><div>This Div <img src=http://jjlcomputer.com/images/delete.jpg /><a href=http://jjlcomputer.com/images/delete.jpg>http://jjlcomputer.com/images/delete.jpg</a></div>';
        //$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
        //$marker['icon'] = 'http://jjlcomputer.com/images/delete.jpg';
        //$marker['animation'] = 'DROP';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '37.409, -122.1319';
        $marker['draggable'] = TRUE;
        $marker['animation'] = 'DROP';
        $this->googlemaps->add_marker($marker);

        $marker = array();
        $marker['position'] = '37.449, -122.1419';
        $marker['onclick'] = 'alert("You just clicked me!!")';
        $this->googlemaps->add_marker($marker);

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('template', $data);
    }

    public function testmap() {
        
        $this->load->library('googlemaps');
        
        $config['map_width'] = '600';
        $config['adsense'] = TRUE;
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);
        
        $marker = array();
        $marker['onclick'] = 'addthis';
        $this->googlemaps->add_marker($marker);
        
        $data['map'] = $this->googlemaps->create_map();
        
        $this->load->view('map/test2',$data);
    }

    public function test2() {
        // load the library

        $this->load->library('Gmap');

// Create a new instance of  Gmap with some default options.
// Valid options are 'Dragging', 'InfoWindow', 'DoubleClickZoom', 'ContinuousZoom', 'GoogleBar', 'ScrollWheelZoom'

        $map = $this->gmap->init('map', array
            (
            'ScrollWheelZoom' => TRUE,
                ));

// Set the map center point, control size and map type
// Valid map types are 'G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_PHYSICAL_MAP'

        $map->center(0, 0, 1)->controls('large')->types('G_PHYSICAL_MAP', 'add');

// Add a custom marker icon
        $map->add_icon('tinyIcon', array(
            'image' => '/images/ihome.png',
            'iconSize' => array('25', '25'),
            'iconAnchor' => array('6', '20'),
            'infoWindowAnchor' => array('5', '1')
        ));

// Add a new marker
        $tag = '<b>In The Attic</b><br />';
        $tag .= '<strong>Tel: </strong>07828 477 616<br />';
        $tag .= '<strong>Web: </strong><a href="http://www.in-the-attic.co.uk" target="_blank">www.in-the-attic.co.uk</a><br />';
        $tag .= '<strong>Address:</strong><br/>42 Beanland Gardens, Wibsey, Bradford, West Yorkshire, United Kingdon, BD6 3PP</p>';

        $map->add_marker('53.764243', '-1.7888458', $tag, array('icon' => 'tinyIcon', 'draggable' => true, 'bouncy' => true));

        $map->center('53.764243', '-1.7888458', 15);

// define the variable for the view

        $data['api_url'] = $map->api_url();

        $data['map'] = $map->render();
    }

    public function testinsert(){
        $this->load->view('map/testinsert');
    }
}
