<?php 

	use PHPUnit\Framework\TestCase;

	class CollectionTest extends TestCase {

		public function testCheckInstantiatedCollectionReturnsNoItems() {

			$collection = new \App\Support\Collection;

			$this->assertEmpty($collection->get());

		}

		public function testIsCorrectForItemsPassesIn () {

			$collection = new \App\Support\Collection ( [
				'one', 'two', 'three'
			]);

			$this->assertEquals(3, $collection->count());

		}

		public function testItemsReturnedMatchItemsPassedIn () {

			$collection = new \App\Support\Collection([
				'one', 'two', 'three'
			]);

			$this->assertCount(3, $collection->get());

			$this->assertEquals($collection->get()[0], 'one');

			$this->assertEquals($collection->get()[1], 'two');

			$this->assertEquals($collection->get()[2], 'three');

		}

		// check collection can be iterated
		public function testCollectionIsInstanceOfIteratorAggregate () {

			$collection = new \App\Support\Collection;

			$this->assertInstanceOf(IteratorAggregate::class, $collection);

		}

		public function testCollectionCanBeIterated () {

			$collection = new \App\Support\Collection([
				'one', 'two', 'three'
			]);

			$items = [];

			foreach ($collection as $item) {
				$items[] = $item;
			}

			$this->assertCount(3, $items);

			$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());

		}

		public function testCollectionCanBeMergedWithAnotherCollection () {

			$collection1 = new \App\Support\Collection([
				'one', 'two'
			]);

			$collection2 = new \App\Support\Collection([
				'three', 'four', 'five'
			]); 

			$newCollection = $collection1->merge($collection2);

			$this->assertCount(5, $newCollection->get());

		}


		public function testCanAddToExistingCollection () {

			$collection = new \App\Support\Collection([
				'one', 'two'
			]);

			$collection->add(['three']);

			$this->assertEquals(3, $collection->count());

			$this->assertCount(3, $collection->get());

		}

		public function testReturnsJsonEncodedItems () {

			$collection = new \App\Support\Collection([
				['usernmae' => 'alex'],
				['username' => 'george'],
			]);

			$this->assertEquals('[{"usernmae":"alex"},{"username":"george"}]', $collection->toJson());	

			$this->assertInternalType('string', $collection->toJson());

		}

		public function testJsonEncodeingACollectionObjectReturnsJson () {

			$collection = new \App\Support\Collection([
				['usernmae' => 'alex'],
				['username' => 'george'],
			]);

			$encoded = json_encode($collection);

			$this->assertEquals('[{"usernmae":"alex"},{"username":"george"}]', $encoded);	

			$this->assertInternalType('string', $encoded);


		}

	}



 ?>