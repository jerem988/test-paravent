<?php

namespace App\Classes;

use Illuminate\Http\Request;

class Continent
{
    private const MIN_WIDTH = 1;
    private const MAX_WIDTH = 100000;
    private const MIN_HEIGHT = 0;
    private const MAX_HEIGHT = 100000;

    public function __construct(private int $width, private string|array $terrain)
    {
        $this->setWidth($width);
        $this->setTerrain($terrain);
    }

    private function setWidth(int $width): void {

        if ($width < self::MIN_WIDTH) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Width ne peut pas être inferieur à %s ; "%s" renseigné',
                    self::MIN_WIDTH,
                    $width
                )
            );
        }

        if ($width > self::MAX_WIDTH) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Width ne peut pas être superieur à %s ; "%s" renseigné',
                    self::MAX_WIDTH,
                    $width
                )
            );
        }

        $this->width = $width;
    }

    /**
     * Fonction qui convertie la chaine en tableau et fait les vérifications
     *
     * @param string $terrain
     */
    private function setTerrain(string $terrain): void {

        $terrain = explode(' ', $terrain);

        if (\count($terrain) > $this->width) {
            throw new \InvalidArgumentException('Le terrain ne peut pas être plus large que le continent');
        }

        foreach ($terrain as $height) {
            if (!is_numeric($height)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Height Invalide ; "%s" renseigné',
                        $height
                    )
                );
            }

            if ($height < 1) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Height ne peut pas être inférieur à %s ; "%s" renseigné',
                        self::MIN_HEIGHT,
                        $height
                    )
                );
            }

            if ($height > 100000) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Height ne peut pas être supérieur à %s ; "%s" renseigné',
                        self::MAX_HEIGHT,
                        $height
                    )
                );
            }
        }

        $this->terrain = $terrain;
    }

    /**
     * Fonction qui calcul la surface ou les Prolosaures sont protégés de la tempête
     *
     * @return int
     */
    public function getSurfaceAbriDisponible(): int
    {
        $safeArea = 0;
        $highest = 0;

        // On boucle sur l'ensemble du continent
        for ($i = 0; $i < $this->width; $i++) {
            $height = $this->terrain[$i] ?? 0;

            if ($height > $highest) {
                //Plus haute alitutude du terrain protégée
                $highest = $height;
            } else {
                // Surface du terrain protégée de la tempête
                $safeArea += $highest - $height;
            }
        }

        return $safeArea;
    }
}
