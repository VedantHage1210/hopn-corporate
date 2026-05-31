protected $fillable = [
    'parent_id',
    'menu_location',
    'sort_order',
    'label_en', 'label_de', 'label_ar',
    'url',
    'page_id',
    'visible_en', 'visible_de', 'visible_ar',
];

protected $casts = [
    'visible_en' => 'boolean',
    'visible_de' => 'boolean',
    'visible_ar' => 'boolean',
];
