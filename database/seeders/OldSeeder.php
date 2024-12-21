<?php

namespace Database\Seeders;

use App\Common\Enum\ContentStatusEnum;
use App\Common\Enum\ContentTypeEnum;
use App\Common\Enum\EncounterStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OldSeeder extends Seeder
{
    private const CHUNK_SIZE = 500;

    public function __construct(private Collection $inserts)
    {
    }

    /**
     * Run the database seeds. Will convert all the old information into the new database.
     */
    public function run(): void
    {
        Schema::connection('mysql')->disableForeignKeyConstraints();

        $this->seedUsers();
        $this->seedAdvertisements();
        $this->seedPagesAndPress();
        $this->seedYearsAndDivisions();
        $this->seedVenues();
        $this->seedTeams();
        $this->seedPlayers();
        $this->seedFixtures();
        $this->seedEncounters();

//        Schema::connection('mysql')->enableForeignKeyConstraints();
    }

    private function seedAdvertisements(): void
    {
        $ads = DB::connection('mysql_old')->table('ad')->get();
        $ads->each(function ($ad) {
            $timeCreated = $ad->timeCreated ? Carbon::createFromTimestamp($ad->timeCreated) : now();
            DB::connection('mysql')->table('contents')->insert([
                'id' => $ad->id + 1000,
                'user_id' => 1,
                'title' => $ad->title,
                'type' => ContentTypeEnum::ADVERTISEMENT,
                'status' => $ad->status === 1 ? ContentStatusEnum::PUBLISHED : ContentStatusEnum::DRAFT,
                'created_at' => $timeCreated,
                'updated_at' => $timeCreated,
            ]);
            DB::connection('mysql')->table('content_metas')->insert([
                [
                    'content_id' => $ad->id + 1000,
                    'name' => 'view_group',
                    'value' => $ad->groupKey,
                    'created_at' => $timeCreated,
                    'updated_at' => $timeCreated,
                ],
                [
                    'content_id' => $ad->id + 1000,
                    'name' => 'description',
                    'value' => $ad->description,
                    'created_at' => $timeCreated,
                    'updated_at' => $timeCreated,
                ],
                [
                    'content_id' => $ad->id + 1000,
                    'name' => 'action',
                    'value' => $ad->action,
                    'created_at' => $timeCreated,
                    'updated_at' => $timeCreated,
                ],
                [
                    'content_id' => $ad->id + 1000,
                    'name' => 'url',
                    'value' => $ad->url,
                    'created_at' => $timeCreated,
                    'updated_at' => $timeCreated,
                ],
            ]);
        });
    }

    private function seedPagesAndPress(): void
    {
        $contents = DB::connection('mysql_old')->table('content')->get();
        $contents->each(function ($content) {
            $timeCreated = $content->timePublished ? Carbon::createFromTimestamp($content->timePublished) : now();
            DB::connection('mysql')->table('contents')->insert([
                'id' => $content->id,
                'user_id' => 1,
                'title' => $content->title,
                'html' => $content->html,
                'slug' => $content->slug,
                'type' => $content->type === 'page' ? ContentTypeEnum::PAGE : ContentTypeEnum::PRESS,
                'status' => $content->status === 1 ? ContentStatusEnum::PUBLISHED : ContentStatusEnum::DRAFT,
                'created_at' => $timeCreated,
                'updated_at' => $timeCreated,
            ]);
        });
    }

    private function seedUsers(): void
    {
        $rows = DB::connection('mysql_old')->table('user')->get();
        $rows->each(function ($row) {
            DB::connection('mysql')->table('users')->insert([
                'id' => $row->id,
                'name' => implode(' ', [$row->nameFirst, $row->nameLast]),
                'email' => $row->email,
                'password' => $row->password,
                'created_at' => Carbon::createFromTimestamp($row->timeRegistered),
                'updated_at' => Carbon::createFromTimestamp($row->timeRegistered),
            ]);
        });
    }

    private function seedYearsAndDivisions(): void
    {
        $years = DB::connection('mysql_old')->table('tennisYear')->get();
        $years->each(function ($year) {
            // Unable to support 2012 with full html output
            if ($year->name === 2012) {
                return;
            }
            DB::connection('mysql')->table('seasons')->insert([
                'id' => $year->id,
                'year' => $year->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        $rows = DB::connection('mysql_old')->table('tennisDivision')->get();
        $rows->each(function ($row) {
            DB::connection('mysql')->table('divisions')->insert([
                'key' => $row->id,
                'season_id' => $row->yearId,
                'name' => $row->name,
            ]);
        });
    }

    private function seedVenues(): void
    {
        $rows = DB::connection('mysql_old')->table('tennisVenue')->get();
        $rows->each(function ($row) {
            DB::connection('mysql')->table('venues')->insert([
                'key' => $row->id,
                'season_id' => $row->yearId,
                'name' => $row->name,
                'slug' => $row->slug,
                'location' => $row->location,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

    }

    private function seedTeams()
    {
        $inserts = [];
        DB::connection('mysql_old')->table('tennisTeam')->cursor()->each(function ($row) use (&$inserts) {
            $inserts[] = [
                'key' => $row->id,
                'season_id' => $row->yearId,
                'name' => $row->name,
                'slug' => $row->slug,
                'home_weekday' => $row->homeWeekday,
                'secretary_id' => $row->secretaryId,
                'venue_id' => $row->venueId,
                'division_id' => $row->divisionId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });
        DB::connection('mysql')->table('teams')->insert($inserts);
    }

    private function seedPlayers()
    {
        DB::connection('mysql_old')->table('tennisPlayer')->cursor()->each(function ($row) {
            $this->inserts->push([
                'key' => $row->id,
                'season_id' => $row->yearId,
                'name_first' => $row->nameFirst,
                'name_last' => $row->nameLast,
                'slug' => $row->slug,
                'rank' => $row->rank,
                'phone_landline' => $row->phoneLandline,
                'phone_mobile' => $row->phoneMobile,
                'etta_license_number' => $row->ettaLicenseNumber,
                'team_id' => $row->teamId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if (count($this->inserts) > self::CHUNK_SIZE) {
                DB::connection('mysql')->table('players')->insert($this->inserts->toArray());
                $this->inserts = new Collection();
            }
        });
        DB::connection('mysql')->table('players')->insert($this->inserts->toArray());
        $this->inserts = new Collection();
    }

    private function seedFixtures(): void
    {
        DB::connection('mysql_old')->table('tennisFixture')->cursor()->each(function ($row) {
            $this->inserts->push([
                'key' => $row->id,
                'season_id' => $row->yearId,
                'team_left_id' => $row->teamIdLeft,
                'team_right_id' => $row->teamIdRight,
                'fulfilled_at' => $row->timeFulfilled ? Carbon::createFromTimestamp($row->timeFulfilled) : null,
                'created_at' => $row->timeFulfilled ? Carbon::createFromTimestamp($row->timeFulfilled) : null,
                'updated_at' => $row->timeFulfilled ? Carbon::createFromTimestamp($row->timeFulfilled) : null,
            ]);
            if (count($this->inserts) > self::CHUNK_SIZE) {
                DB::connection('mysql')->table('fixtures')->insert($this->inserts->toArray());
                $this->inserts = new Collection();
            }
        });
        DB::connection('mysql')->table('fixtures')->insert($this->inserts->toArray());
        $this->inserts = new Collection();
    }

    private function seedEncounters(): void
    {
        DB::connection('mysql_old')->table('tennisEncounter')->cursor()->each(function ($row) {
            $status = null;
            if ($row->status === 'doubles') {
                $status = EncounterStatusEnum::DOUBLES;
            } elseif ($row->status === 'exclude') {
                $status = EncounterStatusEnum::EXCLUDE;
            }

            $this->inserts->push([
                'key' => $row->id,
                'season_id' => $row->yearId,
                'player_left_id' => $row->playerIdLeft,
                'player_right_id' => $row->playerIdRight,
                'score_left' => $row->scoreLeft,
                'score_right' => $row->scoreRight,
                'player_left_rank_change' => $row->playerRankChangeLeft,
                'player_right_rank_change' => $row->playerRankChangeRight,
                'fixture_id' => $row->fixtureId,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if (count($this->inserts) > self::CHUNK_SIZE) {
                DB::connection('mysql')->table('encounters')->insert($this->inserts->toArray());
                $this->inserts = new Collection();
            }
        });
        DB::connection('mysql')->table('encounters')->insert($this->inserts->toArray());
        $this->inserts = new Collection();
    }
}
