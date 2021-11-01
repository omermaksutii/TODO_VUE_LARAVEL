<?php

namespace Api\Tasks\Console;

// dmth te qiky folderi task kurgjo so tu bo jo veq route test mdoket po kqyr testo duhet me e regjistru dikun kit folder po spe di sakt

use Api\Tasks\Repositories\TaskRepository;
use Illuminate\Console\Command;
// 
class AddTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:add {Title} {Description} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new Task';

    /**
     * User repository to persist user in database.
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * Create a new command instance.
     *
     * @param  UserRepository  $userRepository
     *
     * @return void
     */
    public function __construct(TaskRepository $taskRepository)
    {
        parent::__construct();

        $this->taskRepository = $taskRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = $this->taskRepository->create([
            'first_name' => $this->argument('title'),
            'last_name' => $this->argument('description'),
        ]);

        $this->info(sprintf('A task was created with ID %s', $user->id));
    }
}
