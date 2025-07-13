<?php

namespace App\Constants;

use App\Constants\Keys;
use App\Constants\TableData;
use App\Enums\FormTypeCategory;
use InvalidArgumentException;

/**
 * Any data that is static and predetermined by the FEC API, i.e these values will never change
 * (Unless FEC updates their data modals)
 */
class StaticFECData
{
    private const CANDIDATE_STATUSES = [
        [Keys::CODE => 'C', Keys::NAME => 'Present Candidate'],
        [Keys::CODE => 'F', Keys::NAME => 'Future Candidate'],
        [Keys::CODE => 'N', Keys::NAME => 'Not Yet a Candidate'],
        [Keys::CODE => 'P', Keys::NAME => 'Prior Candidate'],
    ];

    private const COMMITTEE_TYPES = [
        [Keys::CODE => 'C', Keys::NAME => 'Communication Cost', Keys::DESCRIPTION => 'Organizations that report communication costs', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'D', Keys::NAME => 'Delegate', Keys::DESCRIPTION => 'Delegate committees for presidential nominating conventions', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'E', Keys::NAME => 'Electioneering', Keys::DESCRIPTION => 'Electioneering communication organizations', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'H', Keys::NAME => 'House', Keys::DESCRIPTION => 'Campaign committees for House candidates', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'I', Keys::NAME => 'IE-Only', Keys::DESCRIPTION => 'Independent expenditure filers (not committees)', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'N', Keys::NAME => 'Non-Qualified PAC', Keys::DESCRIPTION => 'PACs that have not met contribution/expenditure thresholds', Keys::IS_PAC => true, Keys::IS_PARTY => false],
        [Keys::CODE => 'O', Keys::NAME => 'Super PAC', Keys::DESCRIPTION => 'Independent expenditure-only (super PACs)', Keys::IS_PAC => true, Keys::IS_PARTY => false],
        [Keys::CODE => 'P', Keys::NAME => 'Presidential', Keys::DESCRIPTION => 'Campaign committees for presidential candidates', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'Q', Keys::NAME => 'Qualified PAC', Keys::DESCRIPTION => 'PACs that meet contribution/expenditure thresholds', Keys::IS_PAC => true, Keys::IS_PARTY => false],
        [Keys::CODE => 'S', Keys::NAME => 'Senate', Keys::DESCRIPTION => 'Campaign committees for Senate candidates', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'U', Keys::NAME => 'Single-Candidate IE', Keys::DESCRIPTION => 'Single candidate independent expenditure committees', Keys::IS_PAC => false, Keys::IS_PARTY => false],
        [Keys::CODE => 'V', Keys::NAME => 'Hybrid PAC (Non-Qualified)', Keys::DESCRIPTION => 'PACs with non-contribution accounts (non-qualified)', Keys::IS_PAC => true, Keys::IS_PARTY => false],
        [Keys::CODE => 'W', Keys::NAME => 'Hybrid PAC (Qualified)', Keys::DESCRIPTION => 'PACs with non-contribution accounts (qualified)', Keys::IS_PAC => true, Keys::IS_PARTY => false],
        [Keys::CODE => 'X', Keys::NAME => 'Party Non-Qualified', Keys::DESCRIPTION => 'Party committees (non-qualified)', Keys::IS_PAC => false, Keys::IS_PARTY => true],
        [Keys::CODE => 'Y', Keys::NAME => 'Party Qualified', Keys::DESCRIPTION => 'Party committees (qualified)', Keys::IS_PAC => false, Keys::IS_PARTY => true],
        [Keys::CODE => 'Z', Keys::NAME => 'National Party Non-Federal', Keys::DESCRIPTION => 'National party non-federal accounts', Keys::IS_PAC => false, Keys::IS_PARTY => true]
    ];

    private const DESIGNATION_TYPES = [
        [Keys::CODE => 'A', Keys::NAME => 'Authorized by a candidate'],
        [Keys::CODE => 'J', Keys::NAME => 'Joint fundraising committee'],
        [Keys::CODE => 'P', Keys::NAME => 'Principal campaign committee of a candidate'],
        [Keys::CODE => 'U', Keys::NAME => 'Unauthorized'],
        [Keys::CODE => 'B', Keys::NAME => 'Lobbyist/Registrant PAC'],
        [Keys::CODE => 'D', Keys::NAME => 'Leadership PAC']
    ];

    private const FILING_FREQUENCIES = [
        [Keys::CODE => 'A', Keys::NAME => 'Administratively Terminated'],
        [Keys::CODE => 'D', Keys::NAME => 'Debt'],
        [Keys::CODE => 'M', Keys::NAME => 'Monthly Filer'],
        [Keys::CODE => 'Q', Keys::NAME => 'Quarterly Filer'],
        [Keys::CODE => 'T', Keys::NAME => 'Terminated'],
        [Keys::CODE => 'W', Keys::NAME => 'Waived']
    ];

    private const INCUMBENT_CHALLENGE_TYPES = [
        [Keys::CODE => 'I', Keys::NAME => 'Incumbent'],
        [Keys::CODE => 'C', Keys::NAME => 'Challenger'],
        [Keys::CODE => 'O', Keys::NAME => 'Open']
    ];
    private const OFFICE_TYPES = [
        [Keys::CODE => 'H', Keys::NAME => 'House of Representatives'],
        [Keys::CODE => 'S', Keys::NAME => 'Senate'],
        [Keys::CODE => 'P', Keys::NAME => 'Presidential']
    ];
    private const ORGANIZATION_TYPES = [
        [Keys::CODE => 'C', Keys::NAME => 'Corporation'],
        [Keys::CODE => 'L', Keys::NAME => 'Labor Organization'],
        [Keys::CODE => 'M', Keys::NAME => 'Management Organization'],
        [Keys::CODE => 'T', Keys::NAME => 'Trade Association'],
        [Keys::CODE => 'V', Keys::NAME => 'Cooperative'],
        [Keys::CODE => 'W', Keys::NAME => 'Corporation Without Capital Stock']
    ];
    private const PARTIES = [
        [Keys::CODE => 'DEM', Keys::NAME => 'Democrat', 'country_code' => 'USA'],
        [Keys::CODE => 'REP', Keys::NAME => 'Republican', 'country_code' => 'USA'],
        [Keys::CODE => 'IND', Keys::NAME => 'Independent', 'country_code' => 'USA']
    ];
    private const US_STATES = [
        [Keys::CODE => 'US', Keys::NAME => 'United States of America'],
        [Keys::CODE => 'AL', Keys::NAME => 'Alabama'],
        [Keys::CODE => 'AZ', Keys::NAME => 'Arizona'],
        [Keys::CODE => 'AR', Keys::NAME => 'Arkansas'],
        [Keys::CODE => 'CA', Keys::NAME => 'California', 'code_alt' => 'CF'],
        [Keys::CODE => 'CO', Keys::NAME => 'Colorado', 'code_alt' => 'CL'],
        [Keys::CODE => 'CT', Keys::NAME => 'Connecticut'],
        [Keys::CODE => 'DE', Keys::NAME => 'Delaware', 'code_alt' => 'DL'],
        [Keys::CODE => 'DC', Keys::NAME => 'District of Columbia'],
        [Keys::CODE => 'FL', Keys::NAME => 'Florida'],
        [Keys::CODE => 'GA', Keys::NAME => 'Georgia'],
        [Keys::CODE => 'HI', Keys::NAME => 'Hawaii', 'code_alt' => 'HA'],
        [Keys::CODE => 'ID', Keys::NAME => 'Idaho'],
        [Keys::CODE => 'IL', Keys::NAME => 'Illinois'],
        [Keys::CODE => 'IN', Keys::NAME => 'Indiana'],
        [Keys::CODE => 'IA', Keys::NAME => 'Iowa'],
        [Keys::CODE => 'KS', Keys::NAME => 'Kansas', 'code_alt' => 'KA'],
        [Keys::CODE => 'KY', Keys::NAME => 'Kentucky'],
        [Keys::CODE => 'LA', Keys::NAME => 'Louisiana'],
        [Keys::CODE => 'ME', Keys::NAME => 'Maine'],
        [Keys::CODE => 'MD', Keys::NAME => 'Maryland'],
        [Keys::CODE => 'MA', Keys::NAME => 'Massachusetts', 'code_alt' => 'MS'],
        [Keys::CODE => 'MI', Keys::NAME => 'Michigan', 'code_alt' => 'MC'],
        [Keys::CODE => 'MN', Keys::NAME => 'Minnesota'],
        [Keys::CODE => 'MS', Keys::NAME => 'Mississippi'],
        [Keys::CODE => 'MO', Keys::NAME => 'Missouri'],
        [Keys::CODE => 'MT', Keys::NAME => 'Montana'],
        [Keys::CODE => 'NE', Keys::NAME => 'Nebraska', 'code_alt' => 'NB'],
        [Keys::CODE => 'NV', Keys::NAME => 'Nevada'],
        [Keys::CODE => 'NH', Keys::NAME => 'New Hampshire'],
        [Keys::CODE => 'NJ', Keys::NAME => 'New Jersey'],
        [Keys::CODE => 'NM', Keys::NAME => 'New Mexico'],
        [Keys::CODE => 'NY', Keys::NAME => 'New York'],
        [Keys::CODE => 'NC', Keys::NAME => 'North Carolina'],
        [Keys::CODE => 'ND', Keys::NAME => 'North Dakota'],
        [Keys::CODE => 'OH', Keys::NAME => 'Ohio'],
        [Keys::CODE => 'OK', Keys::NAME => 'Oklahoma'],
        [Keys::CODE => 'OR', Keys::NAME => 'Oregon'],
        [Keys::CODE => 'PA', Keys::NAME => 'Pennsylvania'],
        [Keys::CODE => 'RI', Keys::NAME => 'Rhode Island'],
        [Keys::CODE => 'SC', Keys::NAME => 'South Carolina'],
        [Keys::CODE => 'SD', Keys::NAME => 'South Dakota'],
        [Keys::CODE => 'TN', Keys::NAME => 'Tennessee'],
        [Keys::CODE => 'TX', Keys::NAME => 'Texas'],
        [Keys::CODE => 'UT', Keys::NAME => 'Utah'],
        [Keys::CODE => 'VT', Keys::NAME => 'Vermont'],
        [Keys::CODE => 'VA', Keys::NAME => 'Virginia'],
        [Keys::CODE => 'WA', Keys::NAME => 'Washington', 'code_alt' => 'WN'],
        [Keys::CODE => 'WV', Keys::NAME => 'West Virginia'],
        [Keys::CODE => 'WI', Keys::NAME => 'Wisconsin', 'code_alt' => 'WS'],
        [Keys::CODE => 'WY', Keys::NAME => 'Wyoming']
    ];

    private const REPORT_TYPES = [
        [Keys::CODE => '10D', Keys::NAME => 'Pre-Election'],
        [Keys::CODE => '10G', Keys::NAME => 'Pre-General'],
        [Keys::CODE => '10P', Keys::NAME => 'Pre-Primary'],
        [Keys::CODE => '10R', Keys::NAME => 'Pre-Run-Off'],
        [Keys::CODE => '10S', Keys::NAME => 'Pre-Special'],
        [Keys::CODE => '12C', Keys::NAME => 'Pre-Convention'],
        [Keys::CODE => '12G', Keys::NAME => 'Pre-General'],
        [Keys::CODE => '12P', Keys::NAME => 'Pre-Primary'],
        [Keys::CODE => '12R', Keys::NAME => 'Pre-Run-Off'],
        [Keys::CODE => '12S', Keys::NAME => 'Pre-Special'],
        [Keys::CODE => '30D', Keys::NAME => 'Post-Election'],
        [Keys::CODE => '30G', Keys::NAME => 'Post-General'],
        [Keys::CODE => '30P', Keys::NAME => 'Post-Primary'],
        [Keys::CODE => '30R', Keys::NAME => 'Post-Run-Off'],
        [Keys::CODE => '30S', Keys::NAME => 'Post-Special'],
        [Keys::CODE => '60D', Keys::NAME => 'Post-Convention'],
        [Keys::CODE => 'M10', Keys::NAME => 'October Monthly'],
        [Keys::CODE => 'M11', Keys::NAME => 'November Monthly'],
        [Keys::CODE => 'M12', Keys::NAME => 'December Monthly'],
        [Keys::CODE => 'M1', Keys::NAME => 'January Monthly'],
        [Keys::CODE => 'M2', Keys::NAME => 'February Monthly'],
        [Keys::CODE => 'M3', Keys::NAME => 'March Monthly'],
        [Keys::CODE => 'M4', Keys::NAME => 'April Monthly'],
        [Keys::CODE => 'M5', Keys::NAME => 'May Monthly'],
        [Keys::CODE => 'M6', Keys::NAME => 'June Monthly'],
        [Keys::CODE => 'M7', Keys::NAME => 'July Monthly'],
        [Keys::CODE => 'M7S', Keys::NAME => 'July Monthly/Semi-Annual'],
        [Keys::CODE => 'M8', Keys::NAME => 'August Monthly'],
        [Keys::CODE => 'M9', Keys::NAME => 'September Monthly'],
        [Keys::CODE => 'MSA', Keys::NAME => 'Monthly Semi-Annual (MY)'],
        [Keys::CODE => 'MYS', Keys::NAME => 'Monthly Year End/Semi-Annual'],
        [Keys::CODE => 'MSY', Keys::NAME => 'Monthly Semi-Annual (YE)'],
        [Keys::CODE => 'CA', Keys::NAME => 'Comprehensive Amendment'],
        [Keys::CODE => 'ADJ', Keys::NAME => 'Comp Adjust Amend'],
        [Keys::CODE => 'YE', Keys::NAME => 'Year-End'],
        [Keys::CODE => 'TER', Keys::NAME => 'Termination Report'],
        [Keys::CODE => 'Q1', Keys::NAME => 'April Quarterly'],
        [Keys::CODE => 'Q2', Keys::NAME => 'July Quarterly'],
        [Keys::CODE => 'Q2S', Keys::NAME => 'July Quarterly/Semi-Annual'],
        [Keys::CODE => 'Q3', Keys::NAME => 'October Quarterly'],
        [Keys::CODE => 'QSA', Keys::NAME => 'Quarterly Semi-Annual (MY)'],
        [Keys::CODE => 'QYS', Keys::NAME => 'Quarterly Year End/Semi-Annual'],
        [Keys::CODE => 'QYE', Keys::NAME => 'Quarterly Semi-Annual (YE)'],
        [Keys::CODE => 'QMS', Keys::NAME => 'Quarterly Mid-Year/Semi-Annual'],
        [Keys::CODE => 'MY', Keys::NAME => 'Mid-Year Report'],
        [Keys::CODE => '90S', Keys::NAME => 'Post Inaugural Supplement'],
        [Keys::CODE => '90D', Keys::NAME => 'Post Inaugural'],
        [Keys::CODE => '24', Keys::NAME => '24 Hour Report of Independent Expenditures (F5, F24/F3X)'],
        [Keys::CODE => '48', Keys::NAME => '48 Hour Report of Independent Expenditures (F5, F24/F3X)'],
    ];

    private const AMENDMENT_TYPES = [
        [Keys::CODE => 'N', Keys::NAME => 'New'],
        [Keys::CODE => 'A', Keys::NAME => 'Amendment'],
        [Keys::CODE => 'T', Keys::NAME => 'Terminated'],
        [Keys::CODE => 'C', Keys::NAME => 'Consolidated'],
        [Keys::CODE => 'M', Keys::NAME => 'Multi-Candidate'],
        [Keys::CODE => 'S', Keys::NAME => 'Secondary']
    ];

    private const ENTITY_TYPES = [
        [Keys::CODE => 'PR', Keys::NAME => 'Presidential'],
        [Keys::CODE => 'PA', Keys::NAME => 'PAC-Party'],
        [Keys::CODE => 'HS', Keys::NAME => 'House-Senate'],
        [Keys::CODE => 'IE', Keys::NAME => 'IE-Only']
    ];

    private const REQUEST_TYPES = [
        [Keys::CODE => 1, Keys::NAME => 'Statement of Organization'],
        [Keys::CODE => 2, Keys::NAME => 'Report of Receipts and Expenditures (Form 3 and 3X)'],
        [Keys::CODE => 3, Keys::NAME => 'Second Notice - Reports'],
        [Keys::CODE => 4, Keys::NAME => 'Request for Additional Information'],
        [Keys::CODE => 5, Keys::NAME => 'Informational - Reports'],
        [Keys::CODE => 6, Keys::NAME => 'Second Notice - Statement of Organization'],
        [Keys::CODE => 7, Keys::NAME => 'Failure to File'],
        [Keys::CODE => 8, Keys::NAME => 'From Public Disclosure'],
        [Keys::CODE => 9, Keys::NAME => 'From Multi Candidate Status'],
    ];

    private const DOCUMENT_TYPES = [
        [Keys::CODE => '2',  Keys::NAME => '24 Hour Contribution Notice'],
        [Keys::CODE => '4',  Keys::NAME => '48 Hour Contribution Notice'],
        [Keys::CODE => 'A',  Keys::NAME => 'Debt Settlement Statement'],
        [Keys::CODE => 'B',  Keys::NAME => 'Acknowledgment of Receipt of Debt Settlement Statement'],
        [Keys::CODE => 'C',  Keys::NAME => 'RFAI: Debt Settlement First Notice'],
        [Keys::CODE => 'D',  Keys::NAME => 'Commission Debt Settlement Review'],
        [Keys::CODE => 'E',  Keys::NAME => 'Commission Response TO Debt Settlement Request'],
        [Keys::CODE => 'F',  Keys::NAME => 'Administrative Termination'],
        [Keys::CODE => 'G',  Keys::NAME => 'Debt Settlement Plan Amendment'],
        [Keys::CODE => 'H',  Keys::NAME => 'Disavowal Notice'],
        [Keys::CODE => 'I',  Keys::NAME => 'Disavowal Response'],
        [Keys::CODE => 'J',  Keys::NAME => 'Conduit Report'],
        [Keys::CODE => 'K',  Keys::NAME => 'Termination Approval'],
        [Keys::CODE => 'L',  Keys::NAME => 'Repeat Non-Filer Notice'],
        [Keys::CODE => 'M',  Keys::NAME => 'Filing Frequency Change Notice'],
        [Keys::CODE => 'N',  Keys::NAME => 'Paper Amendment to Electronic Report'],
        [Keys::CODE => 'O',  Keys::NAME => 'Acknowledgment of Filing Frequency Change'],
        [Keys::CODE => 'P',  Keys::NAME => 'Notice of Paper Filing'],
        [Keys::CODE => 'Q',  Keys::NAME => 'Acknowledgment of F3L Filing Frequency Change'],
        [Keys::CODE => 'R',  Keys::NAME => 'F3L Filing Frequency Change Notice'],
        [Keys::CODE => 'S',  Keys::NAME => 'RFAI: Debt Settlement Second'],
        [Keys::CODE => 'T',  Keys::NAME => 'Miscellaneous Report TO FEC'],
        [Keys::CODE => 'U',  Keys::NAME => 'Unregistered Committee Notice'],
        [Keys::CODE => 'V',  Keys::NAME => 'Repeat Violation Notice (441A OR 441B)'],
    ];

    private const FORM_TYPES = [
        [Keys::CODE => 'F1', Keys::NAME => 'Statement of Organization', Keys::CATEGORY => FormTypeCategory::STATEMENT],
        [Keys::CODE => 'F1M', Keys::NAME => 'Notification of Multicandidate Status', Keys::CATEGORY => FormTypeCategory::OTHER],
        [Keys::CODE => 'F2', Keys::NAME => 'Statement of Candidacy', Keys::CATEGORY => FormTypeCategory::STATEMENT],
        [Keys::CODE => 'F3', Keys::NAME => 'Report of Receipts and Disbursements for an Authorized Committee', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F3P', Keys::NAME => 'Report of Receipts and Disbursements by an Authorized Committee of a Candidate for The Office of President or Vice President', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F3L', Keys::NAME => 'Report of Contributions Bundled by Lobbyists/Registrants and Lobbyist/Registrant PACs', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F3X', Keys::NAME => 'Report of Receipts and Disbursements for other than an Authorized Committee', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F4', Keys::NAME => 'Report of Receipts and Disbursements for a Committee or Organization Supporting a Nomination Convention', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F5', Keys::NAME => 'Report of Independent Expenditures Made and Contributions Received', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F6', Keys::NAME => '48 Hour Notice of Contributions/Loans Received', Keys::CATEGORY => FormTypeCategory::NOTICE],
        [Keys::CODE => 'F7', Keys::NAME => 'Report of Communication Costs by Corporations and Membership Organizations', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F8', Keys::NAME => 'Debt Settlement Plan', Keys::CATEGORY => FormTypeCategory::OTHER],
        [Keys::CODE => 'F9', Keys::NAME => '24 Hour Notice of Disbursements for Electioneering Communications', Keys::CATEGORY => FormTypeCategory::NOTICE],
        [Keys::CODE => 'F13', Keys::NAME => 'Report of Donations Accepted for Inaugural Committee', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F24', Keys::NAME => '24/48 Hour Report of Independent Expenditures', Keys::CATEGORY => FormTypeCategory::REPORT],
        [Keys::CODE => 'F99', Keys::NAME => 'Miscellaneous Text', Keys::CATEGORY => FormTypeCategory::OTHER],
        [Keys::CODE => 'FRQ', Keys::NAME => 'Request for Additional Information', Keys::CATEGORY => FormTypeCategory::OTHER]
    ];

    public static function getStaticData(array $table): array {

        if(empty($table)) {
            throw new InvalidArgumentException('Argument $table cannot be empty');
        }

        if(isset($table[Keys::NAME])) {
            return match ($table[Keys::NAME]) {
                TableData::CANDIDATE_STATUS_TYPES[Keys::NAME] => self::CANDIDATE_STATUSES,
                TableData::COMMITTEE_TYPES[Keys::NAME] => self::COMMITTEE_TYPES,
                TableData::DESIGNATION_TYPES[Keys::NAME] => self::DESIGNATION_TYPES,
                TableData::FILING_FREQUENCY_TYPES[Keys::NAME] => self::FILING_FREQUENCIES,
                TableData::INCUMBENT_CHALLENGE_TYPES[Keys::NAME] => self::INCUMBENT_CHALLENGE_TYPES,
                TableData::OFFICE_TYPES[Keys::NAME] => self::OFFICE_TYPES,
                TableData::ORGANIZATION_TYPES[Keys::NAME] => self::ORGANIZATION_TYPES,
                TableData::PARTIES[Keys::NAME] => self::PARTIES,
                TableData::US_STATES[Keys::NAME] => self::US_STATES,
                TableData::REPORT_TYPES[Keys::NAME] => self::REPORT_TYPES,
                TableData::AMENDMENT_TYPES[Keys::NAME] => self::AMENDMENT_TYPES,
                TableData::ENTITY_TYPES[Keys::NAME] => self::ENTITY_TYPES,
                TableData::REQUEST_TYPES[Keys::NAME] => self::REQUEST_TYPES,
                TableData::DOCUMENT_TYPES[Keys::NAME] => self::DOCUMENT_TYPES,
                TableData::FORM_TYPES[Keys::NAME] => self::FORM_TYPES,
                default => throw new InvalidArgumentException('Unknown table name'),
            };
        }

        throw new InvalidArgumentException('Passed $table must have property "name". See App/Constants/TableData.php for more available options.');
    }


}
