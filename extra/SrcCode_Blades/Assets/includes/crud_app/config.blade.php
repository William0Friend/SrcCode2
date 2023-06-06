{{--  Method for connection to the database --}}
@php class Config {
    private const DBHOST = 'localhost';
    private const DBUSER = 'Will';
    private const DBPASS = 'N0th1ng4u';
    private const DBNAME = 'fetch_crud_app';

    private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';

    protected $conn = null;

        public function __construct() {
      try {
        $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
      }
    }
  } @endphp