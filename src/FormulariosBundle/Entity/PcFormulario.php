<?php

namespace FormulariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PcFormulario
 *
 * @ORM\Table(name="pc_formulario", uniqueConstraints={@ORM\UniqueConstraint(name="numeroproceso_UNIQUE", columns={"numeroproceso"})})
 * @ORM\Entity(repositoryClass="FormulariosBundle\Repository\PcFormularioRepository")
 */
class PcFormulario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idformulario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformulario;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroproceso", type="string", length=100, nullable=false)
     */
    private $numeroproceso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=120, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechacreacion", type="date", nullable=false)
     */
    private $fechacreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="sede", type="string", length=120, nullable=true)
     */
    private $sede;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $presupuesto;



    /**
     * Get idformulario
     *
     * @return integer
     */
    public function getIdformulario()
    {
        return $this->idformulario;
    }

    /**
     * Set numeroproceso
     *
     * @param string $numeroproceso
     *
     * @return PcFormulario
     */
    public function setNumeroproceso($numeroproceso)
    {
        $this->numeroproceso = $numeroproceso;

        return $this;
    }

    /**
     * Get numeroproceso
     *
     * @return string
     */
    public function getNumeroproceso()
    {
        return $this->numeroproceso;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return PcFormulario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechacreacion
     *
     * @param \DateTime $fechacreacion
     *
     * @return PcFormulario
     */
    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    /**
     * Get fechacreacion
     *
     * @return \DateTime
     */
    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    /**
     * Set sede
     *
     * @param string $sede
     *
     * @return PcFormulario
     */
    public function setSede($sede)
    {
        $this->sede = $sede;

        return $this;
    }

    /**
     * Get sede
     *
     * @return string
     */
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * Set presupuesto
     *
     * @param string $presupuesto
     *
     * @return PcFormulario
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    /**
     * Get presupuesto
     *
     * @return string
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }
}
