<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage YouTube
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: UserProfileEntry.php 24593 2012-01-05 20:35:02Z matthew $
 */

/**
 * @see Zend_Gdata_Entry
 */
require_once 'Zend/Gdata/Entry.php';

/**
 * @see Zend_Gdata_Extension_FeedLink
 */
require_once 'Zend/Gdata/Extension/FeedLink.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Description
 */
require_once 'Zend/Gdata/YouTube/Extension/Description.php';

/**
 * @see Zend_Gdata_YouTube_Extension_AboutMe
 */
require_once 'Zend/Gdata/YouTube/Extension/AboutMe.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Age
 */
require_once 'Zend/Gdata/YouTube/Extension/Age.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Username
 */
require_once 'Zend/Gdata/YouTube/Extension/Username.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Books
 */
require_once 'Zend/Gdata/YouTube/Extension/Books.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Company
 */
require_once 'Zend/Gdata/YouTube/Extension/Company.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Hobbies
 */
require_once 'Zend/Gdata/YouTube/Extension/Hobbies.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Hometown
 */
require_once 'Zend/Gdata/YouTube/Extension/Hometown.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Location
 */
require_once 'Zend/Gdata/YouTube/Extension/Location.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Movies
 */
require_once 'Zend/Gdata/YouTube/Extension/Movies.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Music
 */
require_once 'Zend/Gdata/YouTube/Extension/Music.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Occupation
 */
require_once 'Zend/Gdata/YouTube/Extension/Occupation.php';

/**
 * @see Zend_Gdata_YouTube_Extension_School
 */
require_once 'Zend/Gdata/YouTube/Extension/School.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Gender
 */
require_once 'Zend/Gdata/YouTube/Extension/Gender.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Relationship
 */
require_once 'Zend/Gdata/YouTube/Extension/Relationship.php';

/**
 * @see Zend_Gdata_YouTube_Extension_FirstName
 */
require_once 'Zend/Gdata/YouTube/Extension/FirstName.php';

/**
 * @see Zend_Gdata_YouTube_Extension_LastName
 */
require_once 'Zend/Gdata/YouTube/Extension/LastName.php';

/**
 * @see Zend_Gdata_YouTube_Extension_Statistics
 */
require_once 'Zend/Gdata/YouTube/Extension/Statistics.php';

/**
 * @see Zend_Gdata_Media_Extension_MediaThumbnail
 */
require_once 'Zend/Gdata/Media/Extension/MediaThumbnail.php';

/**
 * Represents the YouTube video playlist flavor of an Atom entry
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage YouTube
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Gdata_YouTube_UserProfileEntry extends Zend_Gdata_Entry
{

    protected $_entryClassName = 'Zend_Gdata_YouTube_UserProfileEntry';

    /**
     * Nested feed links
     *
     * @var array
     */
    protected $_feedLink = array();

    /**
     * The username for this profile entry
     *
     * @var string
     */
    protected $_username = null;

    /**
     * The description of the user
     *
     * @var string
     */
    protected $_description = null;

    /**
     * The contents of the 'About Me' field.
     *
     * @var string
     */
    protected $_aboutMe = null;

    /**
     * The age of the user
     *
     * @var int
     */
    protected $_age = null;

    /**
     * Books of interest to the user
     *
     * @var string
     */
    protected $_books = null;

    /**
     * Company
     *
     * @var string
     */
    protected $_company = null;

    /**
     * Hobbies
     *
     * @var string
     */
    protected $_hobbies = null;

    /**
     * Hometown
     *
     * @var string
     */
    protected $_hometown = null;

    /**
     * Location
     *
     * @var string
     */
    protected $_location = null;

    /**
     * Movies
     *
     * @var string
     */
    protected $_movies = null;

    /**
     * Music
     *
     * @var string
     */
    protected $_music = null;

    /**
     * Occupation
     *
     * @var string
     */
    protected $_occupation = null;

    /**
     * School
     *
     * @var string
     */
    protected $_school = null;

    /**
     * Gender
     *
     * @var string
     */
    protected $_gender = null;

    /**
     * Relationship
     *
     * @var string
     */
    protected $_relationship = null;

    /**
     * First name
     *
     * @var string
     */
    protected $_firstName = null;

    /**
     * Last name
     *
     * @var string
     */
    protected $_lastName = null;

    /**
     * Statistics
     *
     * @var Zend_Gdata_YouTube_Extension_Statistics
     */
    protected $_statistics = null;

    /**
     * Thumbnail
     *
     * @var Zend_Gdata_Media_Extension_MediaThumbnail
     */
    protected $_thumbnail = null;

    /**
     * Creates a User Profile entry, representing an individual user
     * and their attributes.
     *
     * @param DOMElement $element (optional) DOMElement from which this
     *          object should be constructed.
     */
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(Zend_Gdata_YouTube::$namespaces);
        parent::__construct($element);
    }

    /**
     * Retrieves a DOMElement which corresponds to this element and all
     * child properties.  This is used to build an entry back into a DOM
     * and eventually XML text for sending to the server upon updates, or
     * for application storage/persistence.
     *
     * @param DOMDocument $doc The DOMDocument used to construct DOMElements
     * @return DOMElement The DOMElement representing this element and all
     * child properties.
     */
    public function getDOM($doc = null, $majorVersion = 1, $minorVersion = null)
    {
        $element = parent::getDOM($doc, $majorVersion, $minorVersion);
        if ($this->_description != null) {
            $element->appendChild($this->_description->getDOM($element->ownerDocument));
        }
        if ($this->_aboutMe != null) {
            $element->appendChild($this->_aboutMe->getDOM($element->ownerDocument));
        }
        if ($this->_age != null) {
            $element->appendChild($this->_age->getDOM($element->ownerDocument));
        }
        if ($this->_username != null) {
            $element->appendChild($this->_username->getDOM($element->ownerDocument));
        }
        if ($this->_books != null) {
            $element->appendChild($this->_books->getDOM($element->ownerDocument));
        }
        if ($this->_company != null) {
            $element->appendChild($this->_company->getDOM($element->ownerDocument));
        }
        if ($this->_hobbies != null) {
            $element->appendChild($this->_hobbies->getDOM($element->ownerDocument));
        }
        if ($this->_hometown != null) {
            $element->appendChild($this->_hometown->getDOM($element->ownerDocument));
        }
        if ($this->_location != null) {
            $element->appendChild($this->_location->getDOM($element->ownerDocument));
        }
        if ($this->_movies != null) {
            $element->appendChild($this->_movies->getDOM($element->ownerDocument));
        }
        if ($this->_music != null) {
            $element->appendChild($this->_music->getDOM($element->ownerDocument));
        }
        if ($this->_occupation != null) {
            $element->appendChild($this->_occupation->getDOM($element->ownerDocument));
        }
        if ($this->_school != null) {
            $element->appendChild($this->_school->getDOM($element->ownerDocument));
        }
        if ($this->_gender != null) {
            $element->appendChild($this->_gender->getDOM($element->ownerDocument));
        }
        if ($this->_relationship != null) {
            $element->appendChild($this->_relationship->getDOM($element->ownerDocument));
        }
        if ($this->_firstName != null) {
            $element->appendChild($this->_firstName->getDOM($element->ownerDocument));
        }
        if ($this->_lastName != null) {
            $element->appendChild($this->_lastName->getDOM($element->ownerDocument));
        }
        if ($this->_statistics != null) {
            $element->appendChild($this->_statistics->getDOM($element->ownerDocument));
        }
        if ($this->_thumbnail != null) {
            $element->appendChild($this->_thumbnail->getDOM($element->ownerDocument));
        }
        if ($this->_feedLink != null) {
            foreach ($this->_feedLink as $feedLink) {
                $element->appendChild($feedLink->getDOM($element->ownerDocument));
            }
        }
        return $element;
    }

    /**
     * Creates individual Entry objects of the appropriate type and
     * stores them in the $_entry array based upon DOM data.
     *
     * @param DOMNode $child The DOMNode to process
     */
    protected function takeChildFromDOM($child)
    {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;
        switch ($absoluteNodeName) {
        case $this->lookupNamespace('yt') . ':' . 'description':
            $description = new Zend_Gdata_YouTube_Extension_Description();
            $description->transferFromDOM($child);
            $this->_description = $description;
            break;
        case $this->lookupNamespace('yt') . ':' . 'aboutMe':
            $aboutMe = new Zend_Gdata_YouTube_Extension_AboutMe();
            $aboutMe->transferFromDOM($child);
            $this->_aboutMe = $aboutMe;
            break;
        case $this->lookupNamespace('yt') . ':' . 'age':
            $age = new Zend_Gdata_YouTube_Extension_Age();
            $age->transferFromDOM($child);
            $this->_age = $age;
            break;
        case $this->lookupNamespace('yt') . ':' . 'username':
            $username = new Zend_Gdata_YouTube_Extension_Username();
            $username->transferFromDOM($child);
            $this->_username = $username;
            break;
        case $this->lookupNamespace('yt') . ':' . 'books':
            $books = new Zend_Gdata_YouTube_Extension_Books();
            $books->transferFromDOM($child);
            $this->_books = $books;
            break;
        case $this->lookupNamespace('yt') . ':' . 'company':
            $company = new Zend_Gdata_YouTube_Extension_Company();
            $company->transferFromDOM($child);
            $this->_company = $company;
            break;
        case $this->lookupNamespace('yt') . ':' . 'hobbies':
            $hobbies = new Zend_Gdata_YouTube_Extension_Hobbies();
            $hobbies->transferFromDOM($child);
            $this->_hobbies = $hobbies;
            break;
        case $this->lookupNamespace('yt') . ':' . 'hometown':
            $hometown = new Zend_Gdata_YouTube_Extension_Hometown();
            $hometown->transferFromDOM($child);
            $this->_hometown = $hometown;
            break;
        case $this->lookupNamespace('yt') . ':' . 'location':
            $location = new Zend_Gdata_YouTube_Extension_Location();
            $location->transferFromDOM($child);
            $this->_location = $location;
            break;
        case $this->lookupNamespace('yt') . ':' . 'movies':
            $movies = new Zend_Gdata_YouTube_Extension_Movies();
            $movies->transferFromDOM($child);
            $this->_movies = $movies;
            break;
        case $this->lookupNamespace('yt') . ':' . 'music':
            $music = new Zend_Gdata_YouTube_Extension_Music();
            $music->transferFromDOM($child);
            $this->_music = $music;
            break;
        case $this->lookupNamespace('yt') . ':' . 'occupation':
            $occupation = new Zend_Gdata_YouTube_Extension_Occupation();
            $occupation->transferFromDOM($child);
            $this->_occupation = $occupation;
            break;
        case $this->lookupNamespace('yt') . ':' . 'school':
            $school = new Zend_Gdata_YouTube_Extension_School();
            $school->transferFromDOM($child);
            $this->_school = $school;
            break;
        case $this->lookupNamespace('yt') . ':' . 'gender':
            $gender = new Zend_Gdata_YouTube_Extension_Gender();
            $gender->transferFromDOM($child);
            $this->_gender = $gender;
            break;
        case $this->lookupNamespace('yt') . ':' . 'relationship':
            $relationship = new Zend_Gdata_YouTube_Extension_Relationship();
            $relationship->transferFromDOM($child);
            $this->_relationship = $relationship;
            break;
        case $this->lookupNamespace('yt') . ':' . 'firstName':
            $firstName = new Zend_Gdata_YouTube_Extension_FirstName();
            $firstName->transferFromDOM($child);
            $this->_firstName = $firstName;
            break;
        case $this->lookupNamespace('yt') . ':' . 'lastName':
            $lastName = new Zend_Gdata_YouTube_Extension_LastName();
            $lastName->transferFromDOM($child);
            $this->_lastName = $lastName;
            break;
        case $this->lookupNamespace('yt') . ':' . 'statistics':
            $statistics = new Zend_Gdata_YouTube_Extension_Statistics();
            $statistics->transferFromDOM($child);
            $this->_statistics = $statistics;
            break;
        case $this->lookupNamespace('media') . ':' . 'thumbnail':
            $thumbnail = new Zend_Gdata_Media_Extension_MediaThumbnail();
            $thumbnail->transferFromDOM($child);
            $this->_thumbnail = $thumbnail;
            break;
        case $this->lookupNamespace('gd') . ':' . 'feedLink':
            $feedLink = new Zend_Gdata_Extension_FeedLink();
            $feedLink->transferFromDOM($child);
            $this->_feedLink[] = $feedLink;
            break;
        default:
            parent::takeChildFromDOM($child);
            break;
        }
    }

    /**
     * Sets the content of the 'about me' field.
     *
     * @param Zend_Gdata_YouTube_Extension_AboutMe $aboutMe The 'about me'
     *        information.
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_UserProfileEntry Provides a fluent interface
     */
    public function setAboutMe($aboutMe = null)
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The setAboutMe ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
            $this->_aboutMe = $aboutMe;
            return $this;
        }
    }

    /**
     * Returns the contents of the 'about me' field.
     *
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_Extension_AboutMe  The 'about me' information
     */
    public function getAboutMe()
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The getAboutMe ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
            return $this->_aboutMe;
        }
    }

    /**
     * Sets the content of the 'first name' field.
     *
     * @param Zend_Gdata_YouTube_Extension_FirstName $firstName The first name
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_UserProfileEntry Provides a fluent interface
     */
    public function setFirstName($firstName = null)
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The setFirstName ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
            $this->_firstName = $firstName;
            return $this;
        }
    }

    /**
     * Returns the first name
     *
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_Extension_FirstName  The first name
     */
    public function getFirstName()
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The getFirstName ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
            return $this->_firstName;
        }
    }

    /**
     * Sets the content of the 'last name' field.
     *
     * @param Zend_Gdata_YouTube_Extension_LastName $lastName The last name
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_UserProfileEntry Provides a fluent interface
     */
    public function setLastName($lastName = null)
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The setLastName ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
            $this->_lastName = $lastName;
            return $this;
        }
    }

    /**
     * Returns the last name
     *
     * @throws Zend_Gdata_App_VersionException
     * @return Zend_Gdata_YouTube_Extension_LastName  The last name
     */
    public function getLastName()
    {
        if (($this->getMajorProtocolVersion() == null) ||
           ($this->getMajorProtocolVersion() == 1)) {
            require_once 'Zend/Gdata/App/VersionException.php';
            throw new Zend_Gdata_App_VersionException('The getLastName ' .
                ' method is only supported as of version 2 of the YouTube ' .
                'API.');
        } else {
       