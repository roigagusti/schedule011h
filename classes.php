<?php
include_once 'functions.php';
class Task{
    // Properties
    public $atid;
    public $iniciativa;
    public $squad;
    public $pec_id;
    public $owner;
    public $tarea;
    public $start;
    public $end;
    public $altnum;

    // Constructor
    public function __construct($atid, $iniciativa, $squad, $pec_id, $owner, $tarea, $start, $end, $altnum){
        $this->atid = $atid;
        $this->iniciativa = $iniciativa;
        $this->squad = $squad;
        $this->pec_id = $pec_id;
        $this->owner = $owner;
        $this->tarea = $tarea;
        $this->start = $start;
        $this->end = $end;
        $this->altnum = $altnum;
    }
}
class Hito{
    // Properties
    public $atid;
    public $iniciativa;
    public $start;
    public $hito;
    public $hitoDate;

    // Constructor
    public function __construct($atid, $iniciativa, $start, $hito, $hitoDate){
        $this->atid = $atid;
        $this->iniciativa = $iniciativa;
        $this->start = $start;
        $this->hito = $hito;
        $this->hitoDate = $hitoDate;
    }
}
class Habitant{
    // Properties
    public $atid;
    public $name;
    public $short_name;

    // Constructor
    public function __construct($atid, $name, $short_name){
        $this->atid = $atid;
        $this->name = $name;
        $this->short_name = $short_name;
    }
}
class Sprint{
    // Properties
    public $atid;
    public $date;
    public $dateRaw;
    public $quarter;
    public $year;
    public $week;
    public $sprint;
    public $shortname;

    // Constructor
    public function __construct($atid, $date, $dateRaw, $quarter, $year, $week, $sprint, $shortname){
        $this->atid = $atid;
        $this->date = $date;
        $this->dateRaw = $dateRaw;
        $this->quarter = $quarter;
        $this->year = $year;
        $this->week = $week;
        $this->sprint = $sprint;
        $this->shortname = $shortname;
    }
}
class Tasques{
    //Properties
    public $token;
    public $base_id;

    // Constructor
    public function __construct(){
    }

    // Methods
    public function listTasks(){
        $data = findAirtable("initiatives","type","tarea");

        $records = [];
        foreach($data['records'] as $record){
            if(isset($record['fields']['pec_id'])){
                $pec_id = $record['fields']['pec_id'];
            }else{
                $pec_id = "-";
            }
            if(isset($record['fields']['owner'])){
                $owner = $record['fields']['owner'];
            }else{
                $owner = "-";
            }
            if(isset($record['fields']['start_date'])){
                $start_date = strtotime($record['fields']['start_date'][0]);
            }else{
                $start_date = "-";
            }
            if(isset($record['fields']['end_date'])){
                $end_date = strtotime($record['fields']['end_date'][0]);
            }else{
                $end_date = "-";
            }

            $task = new Task(
                $record['id'],
                $record['fields']['iniciativa'],
                $record['fields']['squad'],
                $pec_id,
                $owner,
                $record['fields']['tarea'],
                $start_date,
                $end_date,
                $record['fields']['altnum']
            );
            $records[] = $task;
        }
        //usort($records, "startSort");
        // usort($records, "pec_idSort");
        // usort($records, "squadSort");
        // usort($records, "iniciativaSort");
        usort($records, "altnumSort");
        return $records;
    }
    public function listHitos(){
        $data = findAirtable("initiatives","type","hito");

        $records = [];
        foreach($data['records'] as $record){

            $hito = new Hito(
                $record['id'],
                $record['fields']['iniciativa'],
                strtotime($record['fields']['start_date'][0]),
                $record['fields']['hito'],
                $record['fields']['hito_date']
            );
            $records[] = $hito;
        }
        return $records;
    }
    public function listSprints($year){
        $data = findAirtable("sprints","Year",strval($year));

        $records = [];
        foreach($data['records'] as $record){

            $sprint = new Sprint(
                $record['id'],
                $record['fields']['date'],
                strtotime($record['fields']['date']),
                $record['fields']['Quarter'],
                $record['fields']['Year'],
                $record['fields']['Week'],
                $record['fields']['Sprint'],
                $record['fields']['Short name']
            );
            $records[] = $sprint;
        }
        usort($records, "dateSort");
        return $records;
    }
    public function listHabitants(){
        $data = listAirtable("staff");

        $records = [];
        foreach($data['records'] as $record){

            $habitant = new Habitant(
                $record['id'],
                $record['fields']['name'],
                $record['fields']['Short name']
            );
            $records[] = $habitant;
        }
        usort($records, "nameSort");
        return $records;
    }
}