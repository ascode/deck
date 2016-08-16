<?php
/**
 * @copyright Copyright (c) 2016 Julius Härtl <jus@bitgrid.net>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 *
 * @license GNU AGPL version 3 or any later version
 *  
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *  
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *  
 */

namespace OCA\Deck\Db;

class CardTest extends \PHPUnit_Framework_TestCase {
	private function createCard() {
		$card = new Card();
		$card->setId(1);
		$card->setTitle("My Card");
		$card->setDescription("a long description");
		$card->setStackId(1);
		$card->setType('text');
		$card->setLastModified(234);
		$card->setCreatedAt(123);
		$card->setOwner("admin");
		$card->setOrder(12);
		$card->setArchived(false);
		// TODO: relation shared labels acl
		return $card;
	}
	public function testJsonSerialize() {
		$card = $this->createCard();
		$this->assertEquals([
			'id' => 1,
			'title' => "My Card",
			'description' => "a long description",
			'type' => 'text',
			'lastModified' => 234,
			'createdAt' => 123,
			'owner' => 'admin',
			'order' => 12,
			'stackId' => 1,
			'labels' => null,
			'archived' => false,
		], $card->jsonSerialize());
	}
	public function testJsonSerializeLabels() {
		$card = $this->createCard();
		$card->setLabels(array());
		$this->assertEquals([
			'id' => 1,
			'title' => "My Card",
			'description' => "a long description",
			'type' => 'text',
			'lastModified' => 234,
			'createdAt' => 123,
			'owner' => 'admin',
			'order' => 12,
			'stackId' => 1,
			'labels' => array(),
			'archived' => false,
		], $card->jsonSerialize());
	}

}