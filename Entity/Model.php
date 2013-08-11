<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * VehicleModel Defines a model of vehicle (3 to 4 places, Big vehicle, bus, Class S,...)
 *
 * @ORM\Table(name="ss_vehicle_manager__model")
 * @ORM\Entity
 */
class Model
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
     * @var Vehicles
     *
     * @ORM\ManyToMany(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Vehicle", mappedBy="models")
     * */
    private $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
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
     * @return \Skonsoft\VehicleManagerBundle\Entity\Model
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
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Model
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
     * Set Vehicle
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $vehicles
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Model
     */
    public function setVehicles(ArrayCollection $vehicles)
    {
        $this->vehicles = $vehicles;

        return $this;
    }

    /**
     * Get Vehicles
     *
     * @return ArrayCollection
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * @param Skonsoft\VehicleManagerBundle\Entity\Vehicle $vehicle
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Model
     */
    public function addVehicle(Vehicle $vehicle)
    {
//        $vehicle->setVehicleModel($this);
        $this->vehicles->add($vehicle);

        return $this;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Vehicle $vehicle
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Model
     */
    public function removeVehicle(Vehicle $vehicle)
    {
        $this->vehicles->removeElement($vehicle);
//        unset($vehicle);

        return $this;
    }

}
