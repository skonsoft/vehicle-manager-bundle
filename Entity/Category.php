<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * Category Defines a category of vehicles (Exclusive, shared, upscale, very upscale, ...)
 *
 * @ORM\Table(name="ss_vehicle_manager__category")
 * @ORM\Entity
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var Service
     *
     * @ORM\ManyToOne(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id", nullable=false)
     */
    private $service;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Skonsoft\VehicleManagerBundle\Entity\VehicleModel", mappedBy="category", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $vehicleModels;

    public function __construct()
    {
        $this->vehicleModels = new ArrayCollection();
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
     * @return Category
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
     * @return Category
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
     * @return \Skonsoft\VehicleManagerBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Service $service
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function setService(Service $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Set VehicleModels
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $vehicleModels
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function setVehicleModels(ArrayCollection $vehicleModels)
    {
        $this->vehicleModels = $vehicleModels;

        return $this;
    }

    /**
     * Get VehicleModels
     *
     * @return ArrayCollection
     */
    public function getVehicleModels()
    {
        return $this->vehicleModels;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\VehicleModel $vehicleModel
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function addVehicleModel(VehicleModel $vehicleModel)
    {
        $vehicleModel->setCategory($this);
        $this->vehicleModels->add($vehicleModel);

        return $this;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\VehicleModel $vehicleModel
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function removeVehicleModel(VehicleModel $vehicleModel)
    {
        $this->vehicleModels->removeElement($vehicleModel);
        unset($vehicleModel);

        return $this;
    }

}
