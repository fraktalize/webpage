<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModel.php - Part of the web project.

  © - Johannes Tegnér 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models;

use Carbon\Carbon;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping as ORM;

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
abstract class AbstractModel {

    const TIMEZONE = 'UTC';

    /**
     * @ORM\Column(type="carbon", name="created_at", nullable=false)
     * @var Carbon
     */
    private $createdAt;

    /**
     * @ORM\Column(type="carbon", name="updated_at", nullable=false)
     * @var Carbon
     */
    private $updatedAt;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * AbstractModel constructor.
     */
    public function __construct() {
        $this->createdAt = Carbon::now(self::TIMEZONE);
        $this->updatedAt = Carbon::now(self::TIMEZONE);
    }

    /**
     * @ORM\PreUpdate
     */
    public function onUpdate() {
        $this->updatedAt = Carbon::now(self::TIMEZONE);
    }

    /**
     * Get created at carbon object.
     * @return Carbon
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Get updated at carbon object.
     * @return Carbon
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @return int|null
     */
    public function getId() {
        return $this->id;
    }
}
