<?
class YodleeAPI {
	function core_searchUserTransactions($restClient, $cobSession, $userSession, $fromDate = "", $toDate = "", $searchFor = "") {
			$parameter = array(
				"cobSessionToken" => $cobSession,
				"userSessionToken" => $userSession,
				"transactionSearchRequest.containerType" => "All",
				"transactionSearchRequest.higherFetchLimit" => "500",
				"transactionSearchRequest.lowerFetchLimit" => "1",
				"transactionSearchRequest.resultRange.endNumber" => "1000",
				"transactionSearchRequest.resultRange.startNumber" => "1",
		//		"transactionSearchRequest.searchClients.clietnId" => "1",
		//		"transactionSearchRequest.searchClients.clientName" => "DataSearchService",
				"transactionSearchRequest.userInput" => "",
				"transactionSearchRequest.ignoreUserInput" => "true",
				"transactionSearchRequest.searchFilter.currencyCode" => "USD",
		//		"transactionSearchRequest.searchFilter.postDateRange.fromDate" => "01-01-2013",
		//		"transactionSearchRequest.searchFilter.postDateRange.toDate" => "03-01-2015",
		//		"transactionSearchRequest.searchFilter.transactionSplitType" => "ALL_TRANSACTION",
		//		"transactionSearchRequest.searchFilter.itemAccountId.identifier" => ""
			);
			
			if (trim($searchFor) != "") {
				$parameter["transactionSearchRequest.userInput"] = trim($searchFor);
				$parameter["transactionSearchRequest.ignoreUserInput"] = "false";		
			}

			$response = $restClient->post('/jsonsdk/TransactionSearchService/executeUserSearchRequest', $parameter);
			
			return $response['Body'];
	}
}
?>