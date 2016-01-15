app.controller('poolController', function($scope,$http)
{
	$scope.pools = [];

	$http.get('/technibuddy/public/api/pool').
	success(function(data,status,headers,config)
	{
		$scope.pools = data;
	});

	$scope.addVote = function(poolOptions)
	{
		$http.get('/technibuddy/public/api/pooloption/addvote/'+poolOptions.id).
		success(function(data,status,headers,config)
		{
			poolOptions.vote++;
		});
	}

});

app.controller('adminController', function($scope,$http)
{
	$scope.pools = [];
	$scope.newpool = { };

	$http.get('/technibuddy/public/api/pool').
	success(function(data,status,headers,config)
	{
		$scope.pools = data;
	});


	$scope.addPool = function()
	{
		console.log($scope.pools);  
		$http.post('/technibuddy/public/api/pool', $scope.newpool).
		success(function(data,status,headers,config)
		{
			data.pooloptions = [];
			$scope.pools.push(data);
			$scope.newpool.title="";
		});

	}

	$scope.removePool = function()
	{
		$http.delete('/technibuddy/public/api/pool/' + pool.id).
		success(function(data,status,headers,config)
		{
			for(index = 0; index < $scope.pools.length; ++index)
			{
				if($scope.pools[index].id == pool.id)
				{
					$scope.pools.splice(index,1);
				}
			}
		});
	}

	$scope.addOption = function(pool,newoption)
	{
		newoption.pool_id  = pool.id;
		$http.post('/technibuddy/public/api/pooloptions', newoption).
		success(function(data,status,headers,config)
		{
			pool.pooloptions.push(data);
			newoption.title = "";
		});
	}

	$scope.removeOption = function(pooloptions, pool)
	{

		$http.delete('/technibuddy/public/api/pooloptions/' + pooloptions.id).
		success(function(data,status,headers,config)
		{
			for(index = 0 ; index < pool.pooloptions.length ; ++index)
			{
				if(pool.pooloptions[index].id = pooloptions.id)
				{
					pool.pooloptions.splice(index,1);
				}
			}
		});
	}
});