<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class NewsAddN{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addNnews($data, $file){
	  	$district_id = $this->fm->validation($data['district_id']);
		$district_id = mysqli_real_escape_string($this->db->link,$district_id);
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
		$subcategory_id = $this->fm->validation($data['subcategory_id']);
		$subcategory_id = mysqli_real_escape_string($this->db->link,$subcategory_id);
		$top_news = $this->fm->validation($data['top_news']);
		$top_news = mysqli_real_escape_string($this->db->link,$top_news);
		$news_title = $this->fm->validation($data['news_title']);
		$news_title = mysqli_real_escape_string($this->db->link,$news_title);
		$news_url = $this->fm->validation($data['news_url']);
		$news_url = mysqli_real_escape_string($this->db->link,$news_url);
		$news_seo_title = $this->fm->validation($data['news_seo_title']);
		$news_seo_title = mysqli_real_escape_string($this->db->link,$news_seo_title);
		$news_summery = $this->fm->validation($data['news_summery']);
		$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);
		$news_details = $this->fm->validation($data['news_details']);
		$news_details = mysqli_real_escape_string($this->db->link,$news_details);
		$author = $this->fm->validation($data['author']);
		$author = mysqli_real_escape_string($this->db->link,$author);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->link,$status);
		$date = $this->fm->validation($data['date']);
		$date = mysqli_real_escape_string($this->db->link,$date);
		

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	    if ($category_id =="" || $news_title ==""|| $news_url =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="" || $file_name=="" || $author =="" || $date=="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    }
	    else if ($file_size >1048567) {
		     $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                  return $msg;
		    } else if (in_array($file_ext, $permited) === false) {
		     $msg = "<span class='error'>You can upload only:-</span>"
                       .implode(', ', $permited)."</span>";
                   return $msg;
		    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_newses(district_id,category_id,subcategory_id,top_news, news_title, news_url, news_seo_title,news_summery, news_details,image, author,status,date) VALUES('$district_id','$category_id','$subcategory_id','$top_news','$news_title','$news_url','$news_seo_title','$news_summery','$news_details','$uploaded_image','$author','$status','$date')";
	    	$inserted_row = $this->db->insert($query);

	    	$query = "INSERT INTO local_newses_tbl(category_id,subcategory_id,top_news, news_title, news_url, news_seo_title,news_summery, news_details,image, author,status,date) VALUES('$category_id','$subcategory_id','$top_news','$news_title','$news_url','$news_seo_title','$news_summery','$news_details','$uploaded_image','$author','$status','$date')";
	    	$inserted_row = $this->db->insert($query);
	    	
			if ($inserted_row) {
				$msg = "<span class='success'>inserted successfully!</span>";
			    return $msg;
				
			}else{
				$msg = "<span class='error'>Something Went Wrong!</span>";
			    return $msg;
			}
	    }

	  }
	  public function getAllNews(){
	  	$newsShowquery = "SELECT tbl_newses.*,tbl_ncategory.category_title
					           FROM tbl_newses
					           INNER JOIN tbl_ncategory 
					           ON tbl_newses.category_id = tbl_ncategory.category_id
					           ORDER BY tbl_newses.news_id DESC";
		$result = $this->db->select($newsShowquery);
		return $result;
	  }
	/*recent*/
	  public function getAllNRecentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' ORDER BY news_id DESC LIMIT 9";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*popular*/
	  public function getAllNPopularNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND create_date > DATE_SUB( NOW(), INTERVAL 24 HOUR) ORDER BY hits DESC LIMIT 9";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*mot dimot*/
	  public function getAllmotdimotNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '24' ORDER BY news_id DESC LIMIT 5";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*interview*/
	   public function getAllInterviewNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '25' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*government*/
	   public function getAllgovmentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '26' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*oposite*/
	   public function getAllopositeNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '27' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*superTop*/
	  public function getSuperTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '28' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  public function getNationalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '29' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get cricket top news*/
	  public function getCricketTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '2' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all cricket news*/
	  public function getAllcricketNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '2' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get footbal top news*/
	  public function getFootbalTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '3' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all cricket news*/
	  public function getAllfootballNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '3' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top othersoprts news*/
	  public function getothersportsTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '4' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*getAll othersoprts news*/
	  public function getAllOthersportsNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '4' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sports news*/
	  public function getAllSportsNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '19' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get top political news*/
	  public function getTopPoliticalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '15' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get all political news*/
	  public function getAllPoliticalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '15' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all political news for inner*/
	  public function getAllPoliticalNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '15' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top international news*/
	  public function getTopInternationalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '18' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all international new*/
	  public function getAllInternationalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '18' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all international new for inner*/
	  public function getAllInternationalNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '18' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top economical news*/
	  public function getTopEconomicalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '17' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all economical news*/
	  public function getAllEconomicalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '17' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all economical news for inner page*/
	  public function getAllEconomicalNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '17' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	 /* get dhalywood top news*/
	  public function getDhallywoodTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '11' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get all cricket news*/
	  public function getAlldhallywoodNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '11' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get bollywood top news*/
	  public function getBollyllywoodTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '10' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get bollywood all news*/
	  public function getAllbollywoodNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '10' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get otherentertainment top news*/
	  public function getOtherEntertainmentTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '16' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get otherentertainment all news*/
	  public function getAllOtherEntertainmentinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '16' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get hollywood top news*/
	  public function gethollyllywoodTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '12' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get hollywood all news*/
	  public function getAllhollywoodNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '12' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get probas top news*/
	  public function getProbasTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '5' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get probas top news*/
	  public function getAllprobasNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '5' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /* get technology top news*/
	  public function getTechnologyTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '15' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get technology top news*/
	  public function getAlltechnologyNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '15' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get facebook kothon top news*/
	  public function getFacebookKothonTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '14' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get facebook kothon top news*/
	  public function getAllfaceKothonNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '14' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get jibonjapon top news*/
	  public function getjibonjaponTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '6' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get jibonjapon top news*/
	  public function getAlljibonjaponNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '6' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get women top news*/
	  public function getwomenTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '8' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get women top news*/
	  public function getAllwomenNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '8' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get sahitto top news*/
	  public function getsahittoTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '9' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get sahitto top news*/
	  public function getAllsahittoNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '9' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*top bicitrokhobor news*/
	  public function getTopbicitroNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '22' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all bicitrokhobor news*/
	  public function getAllbicitroNewsinner(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '22' ORDER BY news_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get all Entertainment new*/
	  public function getAllIEntertainmentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '20' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get top Education news*/
	  public function getTopEducationNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '30' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Education new*/
	  public function getAllEducationNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '30' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Technology new*/
	  public function getAllITechnologyNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '15' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Lifestyle new*/
	  public function getAlllifestyleNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '6' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get get Last One Women News*/
	  public function getLastOneWomenNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '8' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get get Last One bicitro News*/
	  public function getLastOneBicitroNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '22' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all breaking news*/	
	  public function getAllBreakingNews(){
	  	$query = "SELECT * FROM tbl_breakingnews WHERE status = '1' ORDER BY breaking_id DESC";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	 /*----------fetch data  for map ---------------------*/ 

	 /*get top Chittagong news*/
	  public function getTopChittagongNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '43' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get all Chittagong news*/
	  public function getAllChittagongNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '43' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top dhaka news*/
	  public function getTopDhakaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '1' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get all dhaka news*/
	  public function getAllDhakaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '1' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top dhaka news*/
	  public function getToppanchagarhNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '31' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all dhaka news*/
	  public function getAllpanchagarhNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '31' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top mymensingh news*/
	  public function getTopmymensinghNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '10' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all mymensingh news*/
	  public function getAllmymensinghNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '10' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	     /*get top netrokona news*/
	  public function getTopnetrokonaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '13' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all netrokona news*/
	  public function getAllnetrokonaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '13' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top gaibandha news*/
	  public function getTopgaibandhaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '27' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all gaibandha news*/
	  public function getAllgaibandhaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '27' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top rangpur news*/
	  public function getToprangpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '32' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all rangpur news*/
	  public function getAllrangpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '32' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top jaipurhat news*/
	  public function getTopjaipurhatNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '19' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all jaipurhat news*/
	  public function getAlljaipurhatNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '19' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top naogaon news*/
	  public function getTopnaogaonNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '20' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all naogaon news*/
	  public function getAllnaogaonNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '20' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top bogra news*/
	  public function getTopbograNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '18' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all bogra news*/
	  public function getAllbograNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '18' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top rajshahi news*/
	  public function getToprajshahiNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '24' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all rajshahi news*/
	  public function getAllrajshahiNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '24' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top chapainawabganj news*/
	  public function getTopchapainawabganjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '22' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all chapainawabganj news*/
	  public function getAllchapainawabganjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '22' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top pabna news*/
	  public function getToppabnaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '23' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all pabna news*/
	  public function getAllpabnaNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '23' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top sherpur news*/
	  public function getTopsherpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '16' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sherpur news*/
	  public function getAllsherpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '16' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top jamalpur news*/
	  public function getTopjamalpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '5' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all jamalpur news*/
	  public function getAlljamalpurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '5' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top gazipur news*/
	  public function getTopgazipurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '3' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all gazipur news*/
	  public function getAllgazipurNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '3' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top norsinghdi news*/
	  public function getTopnorsinghdiNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '12' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all norsinghdi news*/
	  public function getAllnorsinghdiNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '12' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top kishoregonj news*/
	  public function getTopkishoregonjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '6' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all kishoregonj news*/
	  public function getAllkishoregonjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '6' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top sunamganj news*/
	  public function getTopsunamganjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '53' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sunamganj news*/
	  public function getAllsunamganjNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '53' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top sylhet news*/
	  public function sylhetTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '54' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sylhet news*/
	  public function sylhetNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '54' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top maulvibazar news*/
	  public function maulvibazarTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '52' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all maulvibazar news*/
	  public function maulvibazarallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '52' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top habiganj news*/
	  public function habiganjTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '51' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all habiganj news*/
	  public function habiganjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '51' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top chuadanga news*/
	  public function chuadangaTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '56' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all chuadanga news*/
	  public function chuadangaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '56' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top chuadanga news*/
	  public function jhenaidahTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '58' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all chuadanga news*/
	  public function jhenaidahallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '58' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top magura news*/
	  public function maguraTNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '61' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all magura news*/
	  public function maguraallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '61' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top jessore news*/
	  public function jessoreTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '57' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all jessore news*/
	  public function jessoreallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '57' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	     /*get top narail news*/
	  public function narailTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '63' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all narail news*/
	  public function narailallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '63' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top gopalgonj news*/
	  public function gopalgonjTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '4' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all gopalgonj news*/
	  public function gopalgonjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '4' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top chandpur news*/
	  public function chandpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '42' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all chandpur news*/
	  public function chandpurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '42' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top chandpur news*/
	  public function barisalTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '35' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all chandpur news*/
	  public function barisalallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '35' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top khulna news*/
	  public function khulnaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '59' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all khulna news*/
	  public function khulnaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '59' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top satkhira news*/
	  public function satkhiraTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '64' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all satkhira news*/
	  public function satkhiraallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '64' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top bagerhat news*/
	  public function bagerhatTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '55' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all bagerhat news*/
	  public function bagerhatallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '55' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top noakhali news*/
	  public function noakhaliTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '49' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all noakhali news*/
	  public function noakhaliallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '49' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top jhalokhati news*/
	  public function jhalokathiTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '37' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all jhalokhati news*/
	  public function jhalokathiallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '37' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top bhola news*/
	  public function bholaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '36' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all bhola news*/
	  public function bholaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '36' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top khagrachari news*/
	  public function khagrachariTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '47' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all khagrachari news*/
	  public function khagrachariallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '47' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top rangamati news*/
	  public function rangamatiTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '50' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all rangamati news*/
	  public function rangamatiallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '50' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	     /*get top bandarban news*/
	  public function bandarbanTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '40' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all bandarban news*/
	  public function bandarbanallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '40' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	      /*get top cox-s-bazar news*/
	  public function cox_s_bazarTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '45' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all cox-s-bazar news*/
	  public function cox_s_bazarallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '45' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	     /*get top borguna news*/
	  public function borgunaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '34' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all cborguna news*/
	  public function borgunaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '35' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top pirojpur news*/
	  public function pirojpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '39' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all pirojpur news*/
	  public function pirojpurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '39' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	    /*get top comilla news*/
	  public function comillaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '44' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all comilla news*/
	  public function comillaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '44' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
    /*get top feni news*/
	  public function feniTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '46' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all feni news*/
	  public function feniallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '46' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top lakshmipur news*/
	  public function lakshmipurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '46' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all lakshmipur news*/
	  public function lakshmipurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '48' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	     /*get top munsigonj news*/
	  public function munsigonjTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '9' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all munsigonj news*/
	  public function munsigonjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '9' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
     /*get top brahmonbaria news*/
	  public function brahmonbariaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '41' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all brahmonbaria news*/
	  public function brahmonbariaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '41' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	       /*get top faridpur news*/
	  public function faridpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '2' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all faridpur news*/
	  public function faridpurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '2' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	   /*get top sirajganj news*/
	  public function sirajganjTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '25' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sirajganj news*/
	  public function sirajganjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '25' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top tangail news*/
	  public function tangailTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '17' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all tangail news*/
	  public function tangailallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '17' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  	  /*get top kurigram news*/
	  public function kurigramTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '28' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all kurigram news*/
	  public function kurigramallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '28' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  	 /*get top natore news*/
	  public function natoreTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '21' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all natore news*/
	  public function natoreallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '21' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top thakurgaong news*/
	  public function thakurgaongTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '33' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all thakurgaong news*/
	  public function thakurgaongallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '33' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top nilphamari news*/
	  public function nilphamariTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '30' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all nilphamari news*/
	  public function nilphamariallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '30' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top lalmonirhat news*/
	  public function lalmonirhatTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '29' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all lalmonirhat news*/
	  public function lalmonirhatallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '29' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top dinajpur news*/
	  public function dinajpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '26' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all dinajpur news*/
	  public function dinajpurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '26' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top kushtia news*/
	  public function kushtiaTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '60' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all kushtia news*/
	  public function kushtiaallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '60' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top patuakhali news*/
	  public function patuakhaliTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '38' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all patuakhali news*/
	  public function patuakhaliallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '38' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top manikgonj news*/
	  public function manikgonjTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '8' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all manikgonj news*/
	  public function manikgonjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '8' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top shariatpur news*/
	  public function shariatpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '15' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all shariatpur news*/
	  public function shariatpurllNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '15' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top madaripur news*/
	  public function madaripurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '7' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all madaripur news*/
	  public function madaripurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '7' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top narayangonj news*/
	  public function narayangonjTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '11' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all narayangonj news*/
	  public function narayangonjallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '11' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get top rajbari news*/
	  public function rajbariTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '14' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all rajbari news*/
	  public function rajbariallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '14' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get top meherpur news*/
	  public function meherpurTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND district_id = '62' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all meherpur news*/
	  public function meherpurallNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND district_id = '62' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

















	  /*get details news*/
	  public function getsinglenews($singleid){
	  	 $query = "SELECT * FROM tbl_newses WHERE status = '1'AND news_url = '$singleid'";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	   public function changenNewsTopById($id){
	  	$query = "UPDATE tbl_newses SET top_news = !top_news WHERE news_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

	   public function changenNewsStatusById($id){
	  	$query = "UPDATE tbl_newses SET status = !status WHERE news_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

	   public function delnNewsById($id){

		$query ="SELECT * FROM tbl_newses WHERE news_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image'];
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM tbl_newses WHERE news_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }
	 /*for update*/
	  public function getNewsAllById($id){
	  	$ncatShowquery = "SELECT * FROM tbl_newses WHERE news_id = '$id'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  public function updateNewsInfo($data, $file, $id){
	  	$district_id = $this->fm->validation($data['district_id']);
		$district_id = mysqli_real_escape_string($this->db->link,$district_id);
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
		$subcategory_id = $this->fm->validation($data['subcategory_id']);
		$subcategory_id = mysqli_real_escape_string($this->db->link,$subcategory_id);
		$news_title = $this->fm->validation($data['news_title']);
		$news_title = mysqli_real_escape_string($this->db->link,$news_title);
		$news_url = $this->fm->validation($data['news_url']);
		$news_url = mysqli_real_escape_string($this->db->link,$news_url);
		$news_seo_title = $this->fm->validation($data['news_seo_title']);
		$news_seo_title = mysqli_real_escape_string($this->db->link,$news_seo_title);
		$news_summery = $this->fm->validation($data['news_summery']);
		$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);
		$news_details = $this->fm->validation($data['news_details']);
		$news_details = mysqli_real_escape_string($this->db->link,$news_details);
		$update_dateN_time = date("Y-m-d H:i:s");

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	    if ($category_id =="" || $subcategory_id =="" || $news_title =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    } else { /*jehitu photo check korte hocchena*/
	    	if (!empty($file_name)) {
			     if ($file_size >1048567) {
				     $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                          return $msg;
				    } elseif (in_array($file_ext, $permited) === false) {
				     $msg = "<span class='error'>You can upload only:-</span>"
                       .implode(', ', $permited)."</span>";
                        return $msg;
				    }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE tbl_newses
			    			SET
			    			district_id         ='$district_id',
			    			category_id         ='$category_id',
			    			subcategory_id 		='$subcategory_id',
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			image 		        ='$uploaded_image',
			    			news_summery 	    ='$news_summery',
			    			news_details 		='$news_details',
			    			update_dateN_time   ='$update_dateN_time' 
			    			WHERE news_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>Product updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Product Not updated!</span>";
					    return $msg;
					}
			    }
			    } else{
			    	/*akhane move upload hobena/jokhon iage thakbena*/
			    	/*move_uploaded_file($file_temp, $uploaded_image);*/
			    		$query = "UPDATE tbl_newses
			    			SET
			    			district_id         ='$district_id',
			    			category_id         ='$category_id',
			    			subcategory_id 		='$subcategory_id',
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			news_summery 	    ='$news_summery',
			    			news_details 		='$news_details',
			    			update_dateN_time   ='$update_dateN_time'

			    			WHERE news_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Something Went Wrong!</span>";	 

			       }
	           }
	       }
	  }

	  /*date wise search*/
	  public function getnewsByid($data){
	  	$year = $this->fm->validation($data['year']);
		$year = mysqli_real_escape_string($this->db->link,$year);
		$month = $this->fm->validation($data['month']);
		$month = mysqli_real_escape_string($this->db->link,$month);
		$day = $this->fm->validation($data['day']);
		$day = mysqli_real_escape_string($this->db->link,$day);

		$date = $year.'-'.$month.'-'.$day;

		$query = "SELECT * FROM tbl_newses WHERE date = '$date'";
		$result =$this->db->select($query);
		return $result;
	  }

}