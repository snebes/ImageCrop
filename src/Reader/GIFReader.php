<?php
/**
 * (c) Przemek Wiejak <przemek@wiejak.app>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace wiejakp\ImageCrop\Reader;

use wiejakp\ImageCrop\Manager\ReaderManager;

/**
 * Class GIFReader
 *
 * @package wiejakp\ImageCrop\Reader
 */
class GIFReader extends AbstractReader
{
    /**
     * GIFReader constructor.
     *
     * @param ReaderManager $manager
     */
    public function __construct(ReaderManager $manager)
    {
        parent::__construct($manager);

        $this->class = \get_class($this);
    }

    /**
     * @param string $path
     * @return $this|void|AbstractReader
     * @throws \Exception
     */
    public function loadFromPath(string $path)
    {
        try {
            $this->resource = \imagecreatefromgif($path);
        } catch (\Exception $exception) {
            throw new \Exception(
                \sprintf('Provided file is not compatible with %s reader.', $this->getName())
            );
        }

        return $this;
    }
}