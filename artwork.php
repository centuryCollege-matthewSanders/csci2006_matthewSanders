<?php

class Artwork {
    private $id;
    private $dbInfo;

    function __construct($id) {

    }

    function getTitle() {
        return 'Lebrun - Self-portrait in a Straw Hat';
    }

    function getInfoPage() {
        $html = '<article class="artwork">'.
                '<h2 class="art_title">Self-portrait in a Straw Hat</h2>'.
                '<p class="artist">By <a href="#">Louise Elisabeth Lebrun</a></p>'.
                '<figure>'.
                    '<img src="artwork/medium/13.jpg" alt="Self-portrait in a Straw Hat" title="Self-portrait in a Straw Hat" />'.
                    '<figcaption">'.
                        '<p>The painting appears, after cleaning, to be an autograph replica of a picture,'.
                        ' the original of which was painted in Brussels in 1782 in free imitation of Rubens’s ’Chapeau de Paille’,'.
                        ' which LeBrun had seen in Antwerp. It was exhibited in Paris in 1782 at the Salon de la Correspondance.'.
                        ' LeBrun’s original is recorded in a private collection in France.</p>'.
                        '<p class="list_price">$700</p>'.
                        '<div class="actions">'.
                            '<a href="#">Add to Wish List</a>'.
                            '<a href="#">Add to Shopping Cart</a>'.
                        '</div>'.
                        '<table class="artwork_info">'.
                            '<caption>Product Details</caption>';
        $info = array(
            'Date'=>'1782',
            'Medium'=>'Oil on canvas',
            'Dimension'=>'98cm x 71cm',
            'Home'=>'National Gallery, London',
        );
        $linkable = array(
            'Genres'=>array('Realism','Rococo',),
            'Subjects'=>array('People','Arts',),
        );
        foreach ($info as $k=>$v) {
            $html .= '<tr>'.
                '<td class="facet">'.$k.':</td>'.
                '<td class="value">'.$v.'</td>'.
                '</tr>';
        }
        foreach ($linkable as $k=>$vs) {
            $html .= '<tr>'.
                '<td class="facet">'.$k.':</td>'.
                '<td class="value">';
            $glue = '';
            foreach ($vs as $tag) {
                $html .= $glue.'<a href="#">'.$tag.'</a>';
                $glue = ', ';
            }
            $html .= '</td>'.
                '</tr>';
        }
        $html .=        '</table>'.
                    '</figcaption>'.
                '</figure>'.
            '</article>';
        return $html;
    }

}

?>
