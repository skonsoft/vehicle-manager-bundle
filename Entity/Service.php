<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Service Defines a vehicle service Type such as: Standard, VIP,..
 *
 * @ORM\Table(name="ss_vehicle_manager__service")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Category", mappedBy="service", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Categories
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $categories
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Service
     */
    public function setCategories(ArrayCollection $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get Categories
     *
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Category $category
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Service
     */
    public function addCategory(Category $category)
    {
        $category->setService($this);
        $this->categories->add($category);

        return $this;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Category $category
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Service
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
        unset($category);

        return $this;
    }
}
