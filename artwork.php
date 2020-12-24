<?php

class Artwork {
    private $id;
    private $dbInfo;

    public function __construct($id) {

    }

    public function getTitle() {
        return $this->getArtist(false).' - '.$this->getName();
    }

    public function getName() {
        return 'Self-portrait in a Straw Hat';
    }

    public function getArtist($fullName=true) {
        if ($fullName) {
            return 'Louise Elisabeth Lebrun';
        } else {
            return 'Lebrun';
        }
    }

    public function getDescription() {
        return 'The painting appears, after cleaning, to be an autograph replica of a picture,'.
            ' the original of which was painted in Brussels in 1782 in free imitation of Rubens’s ’Chapeau de Paille’,'.
            ' which LeBrun had seen in Antwerp. It was exhibited in Paris in 1782 at the Salon de la Correspondance.'.
            ' LeBrun’s original is recorded in a private collection in France.';
    }

    public function getListPrice() {
        return 700;
    }

    public function getFacets() {
        return array(
            'Date'=>'1782',
            'Medium'=>'Oil on canvas',
            'Dimension'=>'98cm x 71cm',
        );
    }

    public function getLocation() {
        return 'National Gallery, London';
    }

    public function getGenres() {
        return array('Realism','Rococo');
    }

    public function getSubjects() {
        return array('People','Arts');
    }

    public function getRelatedArt() {
        return array(
            293=>'Still Life with Flowers in a Glass Vase',
            183=>'Portrait of Alida Christina Assink',
            820=>'Self-portrait',
            374=>'William II, Prince of Orange, and his Bride, Mary Stuart',
            849=>'Milkmaid',
        );
    }

    public function getInfoPage() {
        $html = '<article class="artwork">'.
                '<h2 class="art_title">'.$this->getName().'</h2>'.
                '<p class="artist">By <a href="#">'.$this->getArtist().'</a></p>'.
                '<figure>'.
                    '<img src="artwork/medium/13.jpg" alt="'.$this->getName().'" title="'.$this->getName().'" />'.
                    '<figcaption>'.
                        '<p>'.$this->getDescription().'</p>'.
                        '<p class="list_price">'.formatUSD($this->getListPrice()).'</p>'.
                        '<div class="actions">'.
                            '<a href="#">Add to Wish List</a>'.
                            '<a href="#">Add to Shopping Cart</a>'.
                        '</div>'.
                        '<table class="artwork_info">'.
                            '<caption>Product Details</caption>';
        $info = $this->getFacets();
        $linkable = array(
            'Home'=>array($this->getLocation()),
            'Genres'=>$this->getGenres(),
            'Subjects'=>$this->getSubjects(),
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

        $related = $this->getRelatedArt();
        $html .= '<h2>Similar Artwork</h2>'.
            '<article class="related">';
        foreach ($related as $k=>$v) {
            $html .= '<div class="relatedArt">'.
                    '<figure>'.
                        '<img src="artwork/small/'.$k.'.jpg" alt="'.$v.'" title="'.$v.'"/>'.
                        '<figcaption>'.
                            '<p><a href="#'.$k.'">'.$v.'</a></p>'.
                        '</figcaption>'.
                    '</figure>'.
                    '<div class="actions">'.
                        '<a href="#">View</a>'.
                        '<a href="#">Wish</a>'.
                        '<a href="#">Cart</a>'.
                    '</div>'.
                '</div>';
        }
        $html .= '</article>';
        return $html;
    }

}

?>
