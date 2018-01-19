<?php
	
	abstract class Employee
	{

		private $name;
		protected $salary;
		protected $category;
		
		
		

		public function setName($name)
		{
			$this->name = $name;
		}


		public function getName()
		{
			return $this->name;
		}


		public function getSalary()
		{
			return $this->salary;
		}

		

		public function getCategory()
		{
			return $this->category;
		}

		abstract public function calcSalary($specificParameter);



	}


	
	class WeeklyEmployee extends Employee
	{
		//const WK_SALARY = 5000;
		//private static $weeklyRate = 5000;
		//protected $weeklyRate =  5000;

		
		function __construct(/*$salary*/)
		{
			
			$this->category = "Weekly";
			//$this->salary = $salary;
		}

		public function calcSalary($specialparam)
		{
			
			$this->salary = $specialparam;
		}
	}

	
	class HourlyEmployee extends Employee
	{
		private $salaryPerHour;
		function __construct($rate)
		{
			$this->salaryPerHour = $rate;
			$this->category = "Hourly";
		}


		public function calcSalary($Overtime =null){
			$basic = ($this->salaryPerHour * 40);
			$this->salary = (!$Overtime) ? $basic : $basic + ($this->salaryPerHour *$Overtime);
		}
	}

	
	class CommissionedEmployee extends Employee
	{
		protected $percentageOfSales;
		protected $sales;
		
		function __construct($percentage)
		{
			$this->category = "Commissioned";
			$this->percentageOfSales = $percentage;
		}

		public function calcSalary($sales)
		{
			$this->salary = ($this->percentageOfSales * $sales);
		}
	}

	

	class CommissionedSalariedEmployee extends CommissionedEmployee
	{
		private $baseSalary;
		private $baseIncrease;
		const BASE_PERCENT = 0.1;

		
		
		function __construct($baseSalary, $percentageSales)
		{
			parent::__construct($percentageSales);
			$this->category = "Salaried-Commissioned";
			$this->baseSalary = $baseSalary;
			$this->percentageOfSales = $percentageSales;
			$this->baseIncrease = (self::BASE_PERCENT * $this->baseSalary) + $this->baseSalary;

		}

		/*@override*/
		public function calcSalary($sales)
		{
			$finalSalary = $this->baseIncrease + ($this->percentageOfSales * $sales);
			$this->salary = $finalSalary;
			
		}
	}






?>