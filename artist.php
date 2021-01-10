<?php

require_once('object.php');

class Artist implements Obj {
    private $id;
    private $dbInfo;

    public function __construct($id) {

    }

    public static function getRandom() {
        return new Artist(1);
    }

    public function getTitle() {
        return $this->getName();
    }

    public function getName() {
        return 'Louise Elisabeth Lebrun';
    }

    public function getDescription() {
        return 'Her artistic style is generally considered part of the aftermath of Rococo with elements of an adopted Neoclassical style.'.
            ' Her subject matter and color palette can be classified as Rococo, but her style is aligned with the emergence of Neoclassicism.'.
            ' Vigée Le Brun created a name for herself in Ancien Régime society by serving as the portrait painter to Marie Antoinette.'.
            ' She enjoyed the patronage of European aristocrats, actors, and writers, and was elected to art academies in ten cities.'.
            ' Vigée Le Brun created some 660 portraits and 200 landscapes. In addition to many works in private collections,'.
            ' her paintings are owned by major museums, such as the Louvre, Hermitage Museum, National Gallery in London,'.
            ' Metropolitan Museum of Art in New York, and many other collections in continental Europe and the United States.';
    }

    public function getArtworks() {
        return array(1=>'Self-portrait in a Straw Hat');
    }

    public function getPreview() {
        return '<article class="artistPreview">'.
                '<figure>'.
                    '<img src="'.$this->getImageName().'" alt="'.$this->getName().'" title="'.$this->getName().'" />'.
                    '<figcaption>'.$this->getName().'</figcaption>'.
                '</figure>'.
                '<p class="artist">By <a href="#">'.$this->getArtist().'</a></p>'.
                '</article>';
    }

    public function getInfoPage() {
        $html = '<article class="artist">'.
                '<h2 class="artistName">'.$this->getName().'</h2>'.
                '<p class="artistDesc">'.$this->getDescription().'</p>'.
                '<div class="artistWorks">';
        $artwork = $this->getArtworks();
        foreach ($artwork as $k=>$v) {
            $work = new Artwork($k);
            $html .= '<figure>'.
                    '<img src="'.$work->getImageName(true).'" />'.
                    '<figcaption>'.$v.'</figcaption>'.
                '</figure>';
        }
        $html .= '</div>'.
            '</article>';
        return $html;
    }


    public static function handleForm($data) {
        return null;
    }

}

?>
