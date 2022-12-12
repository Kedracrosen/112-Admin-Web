<?php namespace App\Models;

use CodeIgniter\Model;
use Google\Cloud\Firestore\FirestoreClient;
define('GOOGLE_APPLICATION_CREDENTIALS', '../../google_service.json');


class FireStoreModel extends Model{

    function __construct() {

        $this->firestore = new FirestoreClient([
            'keyFile' => json_decode(file_get_contents('../writable/google_service.json'), true),
        ]);

    }

    public function get_location($id,$type){

        $docRef = $this->firestore->collection('locations')->document('agent_'.$id);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $data = [];
            $data['lat'] = $snapshot->data()['lat'];
            $data['lng'] = $snapshot->data()['long'] ;
            return $data;
        }
        return false;
    }

    public function test() {
        // Create the Cloud Firestore client
        $firestore = new FirestoreClient([
            'keyFile' => json_decode(file_get_contents('../writable/google_service.json'), true),
        ]);
        

        $docRef = $firestore->collection('locations')->document('agent_13');
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            // printf('Document data:' . PHP_EOL);
            // echo json_encode($snapshot->data()->position);
            // echo $data;
            print_r( $snapshot->data());
        } else {
            printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
        }

        // echo json_encode($firestore);
        // printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);

        // $firestore = new FirestoreClient();

        // $collectionReference = $firestore->collection('Users');
        // $documentReference = $collectionReference->document($userId);
        // $snapshot = $documentReference->snapshot();

        // echo "Hello " . $snapshot['firstName'];
    }




    // protected $table = 'log';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['type', 'actor_id', 'action'];

    // protected $useTimestamps = false;
    // protected $createdFeild = 'time';



    
}