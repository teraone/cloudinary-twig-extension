<?php

namespace Cloudinary\Twig\Extension;

use Cloudinary\Resource as CloudinaryResource;

/**
 * Cloudinary twig extension.
 *
 * @author Keisuke SATO <sato@crocos.co.jp>
 */
class CloudinaryExtension extends \Twig_Extension
{
    /**
     * @var CloudinaryResource $cloudinary
     */
    protected $cloudinary;

    /**
     * Constructor.
     *
     * @param string $cloudName
     */
    public function __construct($cloudName)
    {
        $this->cloudinary = new CloudinaryResource($cloudName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            'cloudinary_url' => new \Twig_Function_Method($this, 'getUrl'),
            'cloudinary_facebook_url' => new \Twig_Function_Method($this, 'getFacebookUrl'),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'cloudinary';
    }

    /**
     * Get cloudinary url
     *
     * @param string $name
     * @param array $options
     * @return string
     */
    public function getUrl($name, array $options = array())
    {
        return $this->cloudinary->getUrl($name, $options);
    }

    /**
     * Get cloudinary facebook url
     *
     * @param string $name
     * @param array $options
     * @return string
     */
    public function getFacebookUrl($name, array $options = array())
    {
        $options['type'] = 'facebook';

        return $this->cloudinary->getUrl($name, $options);
    }
}
