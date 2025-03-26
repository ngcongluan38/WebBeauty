<?php return array (
  'TCG\\Voyager\\Providers\\VoyagerEventServiceProvider' => 
  array (
    'TCG\\Voyager\\Events\\BreadAdded' => 
    array (
      0 => 'TCG\\Voyager\\Listeners\\AddBreadMenuItem',
      1 => 'TCG\\Voyager\\Listeners\\AddBreadPermission',
    ),
    'TCG\\Voyager\\Events\\BreadDeleted' => 
    array (
      0 => 'TCG\\Voyager\\Listeners\\DeleteBreadMenuItem',
    ),
    'TCG\\Voyager\\Events\\SettingUpdated' => 
    array (
      0 => 'TCG\\Voyager\\Listeners\\ClearCachedSettingValue',
    ),
  ),
  'Illuminate\\Foundation\\Support\\Providers\\EventServiceProvider' => 
  array (
  ),
);