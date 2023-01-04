<?php

namespace Database\Seeders\Tenant\ModuleData;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeed extends Seeder
{

    public static function menu_content()
    {
        DB::statement("INSERT INTO `menus` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Primary Menu','[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Home\",\"purl\":\"\"},{\"ptype\":\"pages\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":2},{\"ptype\":\"pages\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":10},{\"ptype\":\"custom\",\"id\":9,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Pages\",\"purl\":\"#\",\"children\":[{\"ptype\":\"pages\",\"id\":5,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":12},{\"ptype\":\"pages\",\"id\":6,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":16},{\"ptype\":\"pages\",\"id\":7,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":14},{\"ptype\":\"pages\",\"id\":10,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":4},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":8,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":17},{\"ptype\":\"pages\",\"id\":26,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":8},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":45,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":3},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":67,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":5},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":88,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":6},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}]},{\"ptype\":\"pages\",\"id\":113,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":7},{\"ptype\":\"pages\",\"id\":114,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":9},{\"ptype\":\"pages\",\"id\":115,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":1}]','default','2022-08-09 16:09:42','2022-11-13 09:30:00'),
	(2,'Secondary Menu','[{\"ptype\":\"pages\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":12},{\"ptype\":\"pages\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":2},{\"ptype\":\"pages\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":6},{\"ptype\":\"pages\",\"id\":5,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":3},{\"ptype\":\"pages\",\"pid\":10,\"id\":7},{\"ptype\":\"pages\",\"id\":6,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":7},{\"ptype\":\"pages\",\"id\":7,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":1}]',NULL,'2022-11-10 05:40:06','2022-11-10 05:42:08')");
    }
}
