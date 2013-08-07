<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleModel Defines a model of vehicle (3 to 4 places, Big vehicle, bus, Class S,...)
 *
 * @ORM\Table(name="ss_vehicle_manager__vehicle_model")
 * @ORM\Entity
 */
class VehicleModel
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
     * @ORM\Column(name="name", type="string", length=255, nullable=fale)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;

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
     * @return VehicleModel
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
     * Set description
     *
     * @param string $description
     * @return VehicleModel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     *
     * @param \Skonsoft\VehicleManagerBundle\Entity\Category $category
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\VehicleModel
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

}
