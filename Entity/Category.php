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
     * @ORM\OneToMany(targetEntity="Skonsoft\VehicleManagerBundle\Entity\Model", mappedBy="category", cascade={"persist", "remove"}, orphanRemoval=true)
     */
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
     * Set Models
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $models
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function setModels(ArrayCollection $models)
    {
        $this->models = $models;

        return $this;
    }

    /**
     * Get VehicleModels
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
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function addModel(Model $model)
    {
        $model->setCategory($this);
        $this->models->add($model);

        return $this;
    }

    /**
     * @param \Skonsoft\VehicleManagerBundle\Entity\Model $model
     *
     * @return \Skonsoft\VehicleManagerBundle\Entity\Category
     */
    public function removeModel(Model $model)
    {
        $this->models->removeElement($model);
        unset($model);

        return $this;
    }

}
