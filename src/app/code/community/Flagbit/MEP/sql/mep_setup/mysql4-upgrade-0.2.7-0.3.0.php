<?php
/**
 * This file is part of the Flagbit_MEP project.
 *
 * Flagbit_CronCli is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category Flagbit_MEP
 * @package Flagbit_MEP
 * @author Damian Luszczymak <damian.luszczymak@flagbit.de>
 * @copyright 2012 Flagbit GmbH & Co. KG (http://www.flagbit.de). All rights served.
 * @license http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version 0.1.0
 * @since 0.2.3
 */
$installer = $this;
$installer->startSetup();

$installer->run("

ALTER TABLE `{$this->getTable('mep/profile')}` ENGINE=`InnoDB`;
ALTER TABLE `{$this->getTable('mep/mapping')}` ENGINE=`InnoDB`;
ALTER TABLE `{$this->getTable('mep/shipping')}` ENGINE=`InnoDB`;
ALTER TABLE `{$this->getTable('mep/shipping_attribute')}` ENGINE=`InnoDB`;

ALTER TABLE `{$this->getTable('mep/mapping')}` ADD FOREIGN KEY (`profile_id`) REFERENCES `{$this->getTable('mep/profile')}` (`id`)   ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `{$this->getTable('mep/shipping_attribute')}` ADD FOREIGN KEY (`profile_id`) REFERENCES `{$this->getTable('mep/shipping')}` (`id`)   ON UPDATE CASCADE ON DELETE CASCADE;
");
$installer->endSetup();
