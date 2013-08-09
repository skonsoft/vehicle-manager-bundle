<?php
namespace Skonsoft\VehicleManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(name="registration", type="string", length=255, unique=true)
     */
    private $registration;

    /**
     * @ORM\ManyToMany(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Model", inversedBy="vehicles")
     * @ORM\JoinTable(name="ss_vehicle_manager__vehicle_models")
     * */
    private $models;

    public function __construct()
    {
        $this->models = new ArrayCollection();
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
     * Set Models
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $models
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
     */
    public function setModels(ArrayCollection $models)
    {
        $this->models = $models;

        return $this;
    }

    /**
     * Get Models
     *
     * @return ArrayCollection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Model $model
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
     */
    public function addModel(Model $model)
    {
        $model->addVehicle($this);
        $this->models->add($model);

        return $this;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Model $model
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Vehicle
     */
    public function removeModel(Model $model)
    {
        $this->models->removeElement($model);
        unset($model);

        return $this;
    }

}
