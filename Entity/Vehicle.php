<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicle Defines a basic vehicle (car, bus,..)
 *
 * @ORM\Table(name="ss_vehicle_manager__vehicle")
 * @ORM\Entity
 */
class Vehicle
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="registration", type="string", length=255)
     */
    private $registration;

    /**
     * @var VehicleModel
     *
     * @ORM\ManyToOne(targetEntity="Skonsoft\VehicleManagerBundle\Entity\VehicleModel")
     * @ORM\JoinColumn(name="vehicle_model_id", referencedColumnName="id", nullable=false)
     */
    private $vehicleModel;

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
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
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
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
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
     * Set registration
     *
     * @param string $registration
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
     */
    public function setRegistration($registration)
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * Get registration
     *
     * @return string
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\VehicleModel
     */
    public function getVehicleModel()
    {
        return $this->vehicleModel;
    }

    /**
     *
     * @param \Skonsoft\VehicleManagerBundle\Entity\VehicleModel $vehicleModel
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
     */
    public function setVehicleModel(VehicleModel $vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
        return $this;
    }

}
