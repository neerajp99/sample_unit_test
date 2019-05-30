<?php 

	use PHPUnit\Framework\TestCase;


	/** 
	* 	@class
	*/

	class SampleTest extends TestCase {

		
	// public function setUp () {

	// 	var_dump('1');

	// }


		public function testThatWeCanGetTheFirstName () {

			$user = new \App\Models\User;

			$user->setFirstName('Billy');

			$this->assertEquals($user->getFirstName(), 'Billy');

		}

		public function testThatWeCanGetTheLastName () {

			$user = new \App\Models\User;

			$user->setLastName('Johnson');

			$this->assertEquals($user->getLastName(), 'Johnson');

		}

		public function testFullNameReturned () {

			$user =  new \App\Models\User;

			$user->setFirstName('Neeraj');
 
			$user->setLastName('Pandey');

			$this->assertEquals($user->getFullName(), 'Neeraj Pandey');

		}

		public function testFirstandLastNameAreTrimmed () {

			$user =  new \App\Models\User;

			$user->setFirstName(' Neeraj      ');
 
			$user->setLastName('        Pandey');

			$this->assertEquals($user->getFirstName(), 'Neeraj');

			$this->assertEquals($user->getLastName(), 'Pandey');


		}

		public function testEmailAddressCanBeSet () {

			$user =  new \App\Models\User;

			$user->setEmail('neeraj@mail.com');

			$this->assertEquals($user->getEmail(), 'neeraj@mail.com');

		}

		public function testEmailVariablesContainCorrectValues () {


			// [
			// 	'full_name' => 'Neeraj Pandey',
			// 	'email' => 'neeraj@mail.com'
			// ]

			$user =  new \App\Models\User;

			$user->setFirstName('Neeraj');
 
			$user->setLastName('Pandey');

			$user->setEmail('neeraj@mail.com');

			$emailVariables = $user->getEmailVariables();

			$this->assertArrayHasKey('full_name', $emailVariables);

			$this->assertArrayHasKey('email', $emailVariables);

			$this->assertEquals($emailVariables['full_name'], 'Neeraj Pandey');

			$this->assertEquals($emailVariables['email'], 'neeraj@mail.com');

		}
	}


 ?>