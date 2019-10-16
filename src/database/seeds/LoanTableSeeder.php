<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Loan;
use App\Models\Banklist;
use App\Models\Borrower;

class LoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $arrLoan =  array(
  array('account_no' => '33742795522','first_sanction_date' => '1/1/1970','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/01/2012','cif' => '85967183287','is_active' => '1'),
  array('account_no' => '34805750898','first_sanction_date' => '12/03/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '09/01/2016','cif' => '88340797069','is_active' => '1'),
  array('account_no' => '61211069639','first_sanction_date' => '18/05/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2016','cif' => '71186602244','is_active' => '1'),
  array('account_no' => '32719705930','first_sanction_date' => '26/11/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/03/2015','cif' => '86531394604','is_active' => '1'),
  array('account_no' => '61189224793','first_sanction_date' => '15/05/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '08/09/2017','cif' => '71171108499','is_active' => '1'),
  array('account_no' => '67357501935','first_sanction_date' => '21/03/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '77142364078','is_active' => '1'),
  array('account_no' => '30541783300','first_sanction_date' => '22/01/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '14/07/2015','cif' => '85295572401','is_active' => '1'),
  array('account_no' => '34025021577','first_sanction_date' => '31/07/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '22/09/2016','cif' => '86820616381','is_active' => '1'),
  array('account_no' => '64071773142','first_sanction_date' => '12/02/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2017','cif' => '74033135906','is_active' => '1'),
  array('account_no' => '67342826361','first_sanction_date' => '10/11/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '77134903544','is_active' => '1'),
  array('account_no' => '35193022321','first_sanction_date' => '08/12/2012','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'BANK OF INDIA','sbi_share' => '16','npa_date' => '04/02/2014','cif' => '86336200476','is_active' => '1'),
  array('account_no' => '31889840856','first_sanction_date' => '17/08/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/10/2015','cif' => '85992802184','is_active' => '1'),
  array('account_no' => '37475986156','first_sanction_date' => '15/10/2007','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '16/10/2012','cif' => '85157092571','is_active' => '1'),
  array('account_no' => '61231715467','first_sanction_date' => '28/07/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '71202430720','is_active' => '1'),
  array('account_no' => '61211513135','first_sanction_date' => '18/05/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2016','cif' => '71186602244','is_active' => '1'),
  array('account_no' => '67371190046','first_sanction_date' => '21/03/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '77142364078','is_active' => '1'),
  array('account_no' => '64071769432','first_sanction_date' => '12/02/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2017','cif' => '74033135906','is_active' => '1'),
  array('account_no' => '32728049942','first_sanction_date' => '08/12/2012','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'BANK OF INDIA','sbi_share' => '16','npa_date' => '04/02/2014','cif' => '86336200476','is_active' => '1'),
  array('account_no' => '61277349531','first_sanction_date' => '28/07/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '71202430720','is_active' => '1'),
  array('account_no' => '61277349790','first_sanction_date' => '18/05/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2016','cif' => '71186602244','is_active' => '1'),
  array('account_no' => '36382630361','first_sanction_date' => '20/01/2006','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/12/2012','cif' => '85448348796','is_active' => '1'),
  array('account_no' => '35643973184','first_sanction_date' => '15/03/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '15/07/2018','cif' => '86593891932','is_active' => '1'),
  array('account_no' => '35513426346','first_sanction_date' => '20/08/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/07/2011','cif' => '85856162466','is_active' => '1'),
  array('account_no' => '61168765352','first_sanction_date' => '22/03/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/12/2016','cif' => '71139751917','is_active' => '1'),
  array('account_no' => '10406487261','first_sanction_date' => '01/01/1982','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '69.17','npa_date' => '12/01/2016','cif' => '80316460895','is_active' => '1'),
  array('account_no' => '37616061473','first_sanction_date' => '25/03/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/11/2013','cif' => '86424198807','is_active' => '1'),
  array('account_no' => '35782348695','first_sanction_date' => '18/05/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/11/2018','cif' => '85938476153','is_active' => '1'),
  array('account_no' => '31110773179','first_sanction_date' => '18/03/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/01/2012','cif' => '85744314894','is_active' => '1'),
  array('account_no' => '37822471257','first_sanction_date' => '18/03/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/01/2012','cif' => '85744315060','is_active' => '1'),
  array('account_no' => '37586580535','first_sanction_date' => '18/03/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/01/2012','cif' => '85744315413','is_active' => '1'),
  array('account_no' => '37541539907','first_sanction_date' => '18/03/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/01/2012','cif' => '85744253657','is_active' => '1'),
  array('account_no' => '65293507103','first_sanction_date' => '23/04/2015','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '','npa_date' => '13/07/2018','cif' => '89548732622','is_active' => '1'),
  array('account_no' => '33925073010','first_sanction_date' => '26/06/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/08/2018','cif' => '87159401165','is_active' => '1'),
  array('account_no' => '36904453607','first_sanction_date' => '25/05/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '13/03/2018','cif' => '85713619452','is_active' => '1'),
  array('account_no' => '62005099117','first_sanction_date' => '03/02/2006','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '','npa_date' => '31/05/2017','cif' => '72002468187','is_active' => '1'),
  array('account_no' => '38333166773','first_sanction_date' => '26/10/2009','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/08/2014','cif' => '72016988190','is_active' => '1'),
  array('account_no' => '61199639375','first_sanction_date' => '26/08/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/02/2017','cif' => '71180017101','is_active' => '1'),
  array('account_no' => '30944274726','first_sanction_date' => '31/10/2009','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '13/07/2018','cif' => '85368116914','is_active' => '1'),
  array('account_no' => '10153995473','first_sanction_date' => '08/02/2002','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/09/2015','cif' => '80121078178','is_active' => '1'),
  array('account_no' => '62128049521','first_sanction_date' => '31/03/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/05/2017','cif' => '72057311028','is_active' => '1'),
  array('account_no' => '65278754470','first_sanction_date' => '30/01/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/09/2017','cif' => '75116647983','is_active' => '1'),
  array('account_no' => '65278767933','first_sanction_date' => '30/01/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/09/2017','cif' => '75116647994','is_active' => '1'),
  array('account_no' => '61319073225','first_sanction_date' => '03/03/2005','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/12/2006','cif' => '78110908734','is_active' => '1'),
  array('account_no' => '65221144620','first_sanction_date' => '23/09/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/01/2010','cif' => '75013872017','is_active' => '1'),
  array('account_no' => '65180583604','first_sanction_date' => '08/10/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '75082422102','is_active' => '1'),
  array('account_no' => '33959455738','first_sanction_date' => '16/06/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/03/2016','cif' => '87459608374','is_active' => '1'),
  array('account_no' => '61172450878','first_sanction_date' => '15/01/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/02/2017','cif' => '71152360132','is_active' => '1'),
  array('account_no' => '35112235110','first_sanction_date' => '25/07/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/06/2017','cif' => '86463175306','is_active' => '1'),
  array('account_no' => '61264408662','first_sanction_date' => '10/03/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/02/2017','cif' => '71230914219','is_active' => '1'),
  array('account_no' => '30841271562','first_sanction_date' => '27/07/2009','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '','cif' => '85600378579','is_active' => '1'),
  array('account_no' => '65234613633','first_sanction_date' => '12/10/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/12/2016','cif' => '75113456935','is_active' => '1'),
  array('account_no' => '38234633470','first_sanction_date' => '29/04/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '14/12/2013','cif' => '76009915379','is_active' => '1'),
  array('account_no' => '36683943281','first_sanction_date' => '21/01/2009','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '','cif' => '80027837237','is_active' => '1'),
  array('account_no' => '37096899342','first_sanction_date' => '25/07/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '02/07/2018','cif' => '89926996053','is_active' => '1'),
  array('account_no' => '51003051533','first_sanction_date' => '16/01/2004','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '10/08/2016','cif' => '78103056129','is_active' => '1'),
  array('account_no' => '36182993548','first_sanction_date' => '14/10/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '13/06/2017','cif' => '89361306673','is_active' => '1'),
  array('account_no' => '32971824652','first_sanction_date' => '02/05/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/10/2018','cif' => '85261188833','is_active' => '1'),
  array('account_no' => '35763799436','first_sanction_date' => '16/01/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '06/04/2017','cif' => '88940240461','is_active' => '1'),
  array('account_no' => '65192369031','first_sanction_date' => '12/03/2007','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '20/12/2008','cif' => '75008325898','is_active' => '1'),
  array('account_no' => '31949154500','first_sanction_date' => '12/09/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '20/08/2016','cif' => '86112224641','is_active' => '1'),
  array('account_no' => '32154830824','first_sanction_date' => '21/01/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/01/2015','cif' => '86248976128','is_active' => '1'),
  array('account_no' => '65101936735','first_sanction_date' => '13/12/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '18/05/2015','cif' => '75042515141','is_active' => '1'),
  array('account_no' => '52091178650','first_sanction_date' => '16/02/2006','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2017','cif' => '78260814832','is_active' => '1'),
  array('account_no' => '61267834245','first_sanction_date' => '15/05/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '71171110180','is_active' => '1'),
  array('account_no' => '67273880053','first_sanction_date' => '28/10/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/03/2018','cif' => '77102679664','is_active' => '1'),
  array('account_no' => '61327645082','first_sanction_date' => '21/08/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/03/2018','cif' => '71187875867','is_active' => '1'),
  array('account_no' => '62461284939','first_sanction_date' => '08/11/2005','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '47.83','npa_date' => '26/03/2011','cif' => '72005908716','is_active' => '1'),
  array('account_no' => '36382903602','first_sanction_date' => '15/07/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/02/2013','cif' => '85845570035','is_active' => '1'),
  array('account_no' => '36379724528','first_sanction_date' => '20/01/2006','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/12/2012','cif' => '85448464790','is_active' => '1'),
  array('account_no' => '32861624874','first_sanction_date' => '25/03/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/10/2015','cif' => '86625623369','is_active' => '1'),
  array('account_no' => '10972437610','first_sanction_date' => '06/11/2007','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2016','cif' => '80783148053','is_active' => '1'),
  array('account_no' => '37586157348','first_sanction_date' => '19/09/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2015','cif' => '75064303185','is_active' => '1'),
  array('account_no' => '61294704891','first_sanction_date' => '29/09/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2017','cif' => '71228989994','is_active' => '1'),
  array('account_no' => '67334699681','first_sanction_date' => '27/08/2015','banking_arrangement' => 'MULTIPLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '24.81','npa_date' => '30/03/2018','cif' => '77132973207','is_active' => '1'),
  array('account_no' => '67141865819','first_sanction_date' => '27/08/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '77055272855','is_active' => '1'),
  array('account_no' => '35262580414','first_sanction_date' => '23/09/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/11/2018','cif' => '85227076731','is_active' => '1'),
  array('account_no' => '31618568417','first_sanction_date' => '16/11/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/01/2017','cif' => '85941276750','is_active' => '1'),
  array('account_no' => '30465832925','first_sanction_date' => '20/01/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2015','cif' => '85296731122','is_active' => '1'),
  array('account_no' => '61139869015','first_sanction_date' => '28/12/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '21/06/2017','cif' => '71134249661','is_active' => '1'),
  array('account_no' => '62420422741','first_sanction_date' => '09/06/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '72173294598','is_active' => '1'),
  array('account_no' => '62420744338','first_sanction_date' => '11/06/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '72173294600','is_active' => '1'),
  array('account_no' => '62420409151','first_sanction_date' => '09/06/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '72173294587','is_active' => '1'),
  array('account_no' => '62420723849','first_sanction_date' => '11/06/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '72173294611','is_active' => '1'),
  array('account_no' => '53050741912','first_sanction_date' => '09/05/2005','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '78350551175','is_active' => '1'),
  array('account_no' => '36565485101','first_sanction_date' => '28/02/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/09/2018','cif' => '89616501441','is_active' => '1'),
  array('account_no' => '67247783673','first_sanction_date' => '08/10/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2015','cif' => '77097283697','is_active' => '1'),
  array('account_no' => '65196417324','first_sanction_date' => '14/03/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2017','cif' => '75089621767','is_active' => '1'),
  array('account_no' => '36963217399','first_sanction_date' => '06/05/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '23/07/2018','cif' => '75101733094','is_active' => '1'),
  array('account_no' => '34254678610','first_sanction_date' => '15/09/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2015','cif' => '87745994929','is_active' => '1'),
  array('account_no' => '31996465463','first_sanction_date' => '20/09/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/09/2016','cif' => '86169145923','is_active' => '1'),
  array('account_no' => '31891599824','first_sanction_date' => '01/01/1982','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '69.17','npa_date' => '12/01/2016','cif' => '80316460895','is_active' => '1'),
  array('account_no' => '33925432685','first_sanction_date' => '26/06/2004','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/08/2018','cif' => '87159401165','is_active' => '1'),
  array('account_no' => '36904814203','first_sanction_date' => '25/05/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '13/03/2018','cif' => '85713619452','is_active' => '1'),
  array('account_no' => '62268362884','first_sanction_date' => '03/02/2006','banking_arrangement' => 'CONSORTIUM','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '','npa_date' => '31/05/2017','cif' => '72002468187','is_active' => '1'),
  array('account_no' => '65278753726','first_sanction_date' => '30/01/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/09/2017','cif' => '75116647983','is_active' => '1'),
  array('account_no' => '65278769011','first_sanction_date' => '30/01/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '01/09/2017','cif' => '75116647994','is_active' => '1'),
  array('account_no' => '65179657888','first_sanction_date' => '08/10/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '75082422102','is_active' => '1'),
  array('account_no' => '35111834534','first_sanction_date' => '25/07/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/06/2017','cif' => '86463175306','is_active' => '1'),
  array('account_no' => '65244010778','first_sanction_date' => '12/10/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/12/2016','cif' => '75113456935','is_active' => '1'),
  array('account_no' => '67254390300','first_sanction_date' => '28/10/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '26/03/2018','cif' => '77102679664','is_active' => '1'),
  array('account_no' => '61238738261','first_sanction_date' => '21/08/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/06/2017','cif' => '71187875867','is_active' => '1'),
  array('account_no' => '37586165020','first_sanction_date' => '19/09/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2015','cif' => '75064303185','is_active' => '1'),
  array('account_no' => '61296703895','first_sanction_date' => '29/09/2015','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2017','cif' => '71228989994','is_active' => '1'),
  array('account_no' => '67348026914','first_sanction_date' => '27/08/2015','banking_arrangement' => 'MULTIPLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '24.81','npa_date' => '30/03/2018','cif' => '77132973207','is_active' => '1'),
  array('account_no' => '36963211716','first_sanction_date' => '06/05/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '23/07/2018','cif' => '75101733094','is_active' => '1'),
  array('account_no' => '36904709854','first_sanction_date' => '25/05/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '13/03/2018','cif' => '85713619452','is_active' => '1'),
  array('account_no' => '67357127128','first_sanction_date' => '27/08/2015','banking_arrangement' => 'MULTIPLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '24.81','npa_date' => '30/03/2018','cif' => '77132973207','is_active' => '1'),
  array('account_no' => '37149024837','first_sanction_date' => '01/09/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2018','cif' => '89960501140','is_active' => '1'),
  array('account_no' => '30469431408','first_sanction_date' => '09/07/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '24/06/2017','cif' => '85299399179','is_active' => '1'),
  array('account_no' => '31061696164','first_sanction_date' => '10/02/2010','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '16/08/2017','cif' => '85726632490','is_active' => '1'),
  array('account_no' => '35769849008','first_sanction_date' => '04/05/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '27/09/2018','cif' => '87349352610','is_active' => '1'),
  array('account_no' => '37523512900','first_sanction_date' => '15/03/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2014','cif' => '86018080954','is_active' => '1'),
  array('account_no' => '37149031265','first_sanction_date' => '01/09/2017','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2018','cif' => '89960501140','is_active' => '1'),
  array('account_no' => '37521639576','first_sanction_date' => '15/03/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2014','cif' => '86018080954','is_active' => '1'),
  array('account_no' => '35361914549','first_sanction_date' => '15/03/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2014','cif' => '86018080954','is_active' => '1'),
  array('account_no' => '32760317084','first_sanction_date' => '07/03/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/11/2017','cif' => '86351702614','is_active' => '1'),
  array('account_no' => '33369783055','first_sanction_date' => '23/05/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/12/2016','cif' => '86092856077','is_active' => '1'),
  array('account_no' => '10295388115','first_sanction_date' => '24/12/2004','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/03/2018','cif' => '80229828950','is_active' => '1'),
  array('account_no' => '10116387335','first_sanction_date' => '16/03/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/06/2016','cif' => '80091981079','is_active' => '1'),
  array('account_no' => '31797020042','first_sanction_date' => '20/11/2008','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '86061092414','is_active' => '1'),
  array('account_no' => '34087308160','first_sanction_date' => '04/08/2014','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2015','cif' => '87599343212','is_active' => '1'),
  array('account_no' => '31679363291','first_sanction_date' => '02/02/2001','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/03/2003','cif' => '80208470816','is_active' => '1'),
  array('account_no' => '33853677205','first_sanction_date' => '07/03/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/11/2017','cif' => '86351702614','is_active' => '1'),
  array('account_no' => '33814313164','first_sanction_date' => '23/05/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/12/2016','cif' => '86092856077','is_active' => '1'),
  array('account_no' => '10972437869','first_sanction_date' => '27/10/2004','banking_arrangement' => 'SOLE','lead_bank' => 'BANK OF INDIA','sbi_share' => '100','npa_date' => '28/07/2016','cif' => '80783150877','is_active' => '1'),
  array('account_no' => '32291002916','first_sanction_date' => '31/03/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/03/2018','cif' => '86305411756','is_active' => '1'),
  array('account_no' => '10150847223','first_sanction_date' => '26/03/1991','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '31/03/1995','cif' => '80119082940','is_active' => '1'),
  array('account_no' => '32770588892','first_sanction_date' => '19/01/2013','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/05/2016','cif' => '86441979561','is_active' => '1'),
  array('account_no' => '32374998797','first_sanction_date' => '04/06/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/01/2017','cif' => '86336884137','is_active' => '1'),
  array('account_no' => '33921829299','first_sanction_date' => '10/02/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '','cif' => '86010687682','is_active' => '1'),
  array('account_no' => '32727617385','first_sanction_date' => '17/11/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/09/2013','cif' => '86539854746','is_active' => '1'),
  array('account_no' => '62211541687','first_sanction_date' => '03/10/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/04/2015','cif' => '72009215672','is_active' => '1'),
  array('account_no' => '31031214484','first_sanction_date' => '19/05/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '12/12/2015','cif' => '80026071487','is_active' => '1'),
  array('account_no' => '32029740832','first_sanction_date' => '24/10/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '30/04/2018','cif' => '86185095561','is_active' => '1'),
  array('account_no' => '37713374258','first_sanction_date' => '10/02/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/10/2013','cif' => '86010688289','is_active' => '1'),
  array('account_no' => '31648941689','first_sanction_date' => '29/03/2016','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '23/01/2018','cif' => '85987608683','is_active' => '1'),
  array('account_no' => '10972437745','first_sanction_date' => '19/04/2004','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/01/2017','cif' => '80783149589','is_active' => '1'),
  array('account_no' => '36684452215','first_sanction_date' => '10/02/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '','cif' => '86010687682','is_active' => '1'),
  array('account_no' => '32712406416','first_sanction_date' => '17/11/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/09/2013','cif' => '86539854746','is_active' => '1'),
  array('account_no' => '62277627434','first_sanction_date' => '03/10/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/04/2015','cif' => '72009215672','is_active' => '1'),
  array('account_no' => '1550702','first_sanction_date' => '10/02/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/10/2013','cif' => '86010688289','is_active' => '1'),
  array('account_no' => '32714253727','first_sanction_date' => '17/11/2012','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '28/09/2013','cif' => '86539854746','is_active' => '1'),
  array('account_no' => '62312587797','first_sanction_date' => '03/10/2011','banking_arrangement' => 'SOLE','lead_bank' => 'STATE BANK OF INDIA','sbi_share' => '100','npa_date' => '29/04/2015','cif' => '72009215672','is_active' => '1')
);
        foreach ($arrLoan as $key => $value)
        {
            $borrower_id = Borrower::where("cif", $value['cif'])->first()->_id;
            $bank_id = Banklist::where('bank_name', $value['lead_bank'])->first()->_id;
            $value['lead_bank'] = $bank_id;
            $value['borrower_id'] = $borrower_id;
            $value['banking_arrangement'] = strtolower($value['banking_arrangement']);
            if(!empty($value['first_sanction_date']))
            {
              $ddFormat = date_create_from_format('d/m/Y',$value['first_sanction_date']);
              $yyFormat=  date_format($ddFormat,'Y/m/d');
              $value['first_sanction_date'] = new MongoDB\BSON\UTCDateTime(strtotime($yyFormat) * 1000);
            }
            if(!empty($value['npa_date']))
            {
              $ddFormat = date_create_from_format('d/m/Y',$value['npa_date']);
              $yyFormat=  date_format($ddFormat,'Y/m/d');
              $value['npa_date'] = new MongoDB\BSON\UTCDateTime(strtotime($yyFormat) * 1000);
            }

            unset($value['cif']);

            $arrLoanRes = Loan::where('account_no', $value['account_no'])->first();
            if(!empty($arrLoanRes))
            {
              $loan = Loan::find($arrLoanRes->_id);
              $loan->account_no = $value['account_no'];
              $loan->first_sanction_date = $value['first_sanction_date'];
              $loan->banking_arrangement = $value['banking_arrangement'];
              $loan->lead_bank = $value['lead_bank'];
              $loan->sbi_share = $value['sbi_share'];
              if(!empty($value['npa_date']))
              {
                $loan->npa_date = $value['npa_date'];
              }
              $loan->borrower_id = $value['borrower_id'];
              $loan->save();
            }
            else
            {
              Loan::create($value);
            }
        }
    }
}