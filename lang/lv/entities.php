<?php
/**
 * Text used for 'Entities' (Document Structure Elements) such as
 * Books, Shelves, Chapters & Pages
 */
return [

    // Shared
    'recently_created' => 'Nesen izveidots',
    'recently_created_pages' => 'Nesen izveidotās lapas',
    'recently_updated_pages' => 'Nesen atjauninātās lapas',
    'recently_created_chapters' => 'Nesen izveidotās nodaļas',
    'recently_created_books' => 'Nesen izveidotās grāmatas',
    'recently_created_shelves' => 'Nesen izveidotie plaukti',
    'recently_update' => 'Nesen atjaunināts',
    'recently_viewed' => 'Nesen skatītie',
    'recent_activity' => 'Pēdējās aktivitātes',
    'create_now' => 'Izveidot tagad',
    'revisions' => 'Revīzijas',
    'meta_revision' => 'Revīzija #:revisionCount',
    'meta_created' => 'Izveidots :timeLength',
    'meta_created_name' => ':user izveidojis pirms :timeLength',
    'meta_updated' => 'Atjaunināts :timeLength',
    'meta_updated_name' => ':user atjauninājis pirms :timeLength',
    'meta_owned_name' => 'Īpašnieks :user',
    'meta_reference_count' => 'Atsauce :count vienumā|Atsauce :count vienumos',
    'entity_select' => 'Izvēlēties vienumu',
    'entity_select_lack_permission' => 'Jums nav nepieciešamās piekļuves tiesības, lai izvēlētu šo vienumu',
    'images' => 'Attēli',
    'my_recent_drafts' => 'Mani melnraksti',
    'my_recently_viewed' => 'Mani nesen skatītie',
    'my_most_viewed_favourites' => 'Mani biežāk skatītie favorīti',
    'my_favourites' => 'Mani favorīti',
    'no_pages_viewed' => 'Neviena lapa vēl nav skatīta',
    'no_pages_recently_created' => 'Nav radīta neviena lapa',
    'no_pages_recently_updated' => 'Nav atjaunināta neviena lapa',
    'export' => 'Eksportēt',
    'export_html' => 'Pilna satura web fails',
    'export_pdf' => 'PDF fails',
    'export_text' => 'Vienkāršs teksta fails',
    'export_md' => 'Markdown fails',
    'default_template' => 'Noklusētā lapas sagatave',
    'default_template_explain' => 'Assign a page template that will be used as the default content for all pages created within this item. Keep in mind this will only be used if the page creator has view access to the chosen template page.',
    'default_template_select' => 'Izvēlēt sagataves lapu',

    // Permissions and restrictions
    'permissions' => 'Atļaujas',
    'permissions_desc' => 'Uzstādīt tiesības šeit, lai aizvietotu noklusētās tiesības no lietotāju lomām.',
    'permissions_book_cascade' => 'Piekļuves tiesības, kas uzstādītas grāmatām, automātiski tiks piešķirtas pakārtotajām nodaļām un lapām, ja vien tām nav atsevišķi norādītas savas piekļuves tiesības.',
    'permissions_chapter_cascade' => 'Piekļuves tiesības, kas uzstādītas nodaļām, automātiski tiks piešķirtas pakārtotajām lapām, ja vien tām nav atsevišķi norādītas savas piekļuves tiesības.',
    'permissions_save' => 'Saglabāt atļaujas',
    'permissions_owner' => 'Īpašnieks',
    'permissions_role_everyone_else' => 'Visi pārējie',
    'permissions_role_everyone_else_desc' => 'Set permissions for all roles not specifically overridden.',
    'permissions_role_override' => 'Aizvietot lomas tiesības',
    'permissions_inherit_defaults' => 'Mantot noklusētās vērtības',

    // Search
    'search_results' => 'Meklēšanas rezultāti',
    'search_total_results_found' => ':count meklēšanas rezultāts|:count meklēšanas rezultāti',
    'search_clear' => 'Notīrīt meklēšanu',
    'search_no_pages' => 'Neviena lapa neatbilst meklēšanai',
    'search_for_term' => 'Meklēt :term',
    'search_more' => 'Vairāk rezultāti',
    'search_advanced' => 'Paplašināta meklēšana',
    'search_terms' => 'Meklēšanas parametri',
    'search_content_type' => 'Satura tips',
    'search_exact_matches' => 'Precīza atbilstība',
    'search_tags' => 'Birku meklēšana',
    'search_options' => 'Iestatījumi',
    'search_viewed_by_me' => 'Manis apskatītie',
    'search_not_viewed_by_me' => 'Neesmu skatījis',
    'search_permissions_set' => 'Iestatītās atļaujas',
    'search_created_by_me' => 'Manis izveidotie',
    'search_updated_by_me' => 'Manis atjauninātie',
    'search_owned_by_me' => 'Es esmu īpašnieks',
    'search_date_options' => 'Datuma iestatījumi',
    'search_updated_before' => 'Atjaunināts pirms',
    'search_updated_after' => 'Atjaunināts pēc',
    'search_created_before' => 'Izveidots pirms',
    'search_created_after' => 'Izveidots pēc',
    'search_set_date' => 'Norādīt datumu',
    'search_update' => 'Atjaunināt meklētāju',

    // Shelves
    'shelf' => 'Plaukts',
    'shelves' => 'Plaukti',
    'x_shelves' => ':count Plaukts|:count Plaukti',
    'shelves_empty' => 'Neviens plaukts nav izveidots',
    'shelves_create' => 'Izveidot jaunu plauktu',
    'shelves_popular' => 'Populāri plaukti',
    'shelves_new' => 'Jauni plaukti',
    'shelves_new_action' => 'Jauns plaukts',
    'shelves_popular_empty' => 'Populārākie plaukti tiks rādīti šeit.',
    'shelves_new_empty' => 'Pēdējie izveidotie plaukti tiks rādīti šeit.',
    'shelves_save' => 'Saglabāt plauktu',
    'shelves_books' => 'Grāmatas šajā plauktā',
    'shelves_add_books' => 'Pievienot grāmatas šim plauktam',
    'shelves_drag_books' => 'Ievelciet grāmatas zemāk, lai novietotu tās šajā plauktā',
    'shelves_empty_contents' => 'Šim gŗamatplauktam nav pievienotu grāmatu',
    'shelves_edit_and_assign' => 'Labot plauktu, lai tam pievienotu grāmatas',
    'shelves_edit_named' => 'Rediģēt plauktu :name',
    'shelves_edit' => 'Rediģēt plauktu',
    'shelves_delete' => 'Dzēst plauktu',
    'shelves_delete_named' => 'Dzēst plauktu :name',
    'shelves_delete_explain' => "Tiks dzēsts plaukts ar nosaukumu \":name\". Tajā ievietotās grāmatas netiks dzēstas.",
    'shelves_delete_confirmation' => 'Vai esat pārliecināts, ka vēlaties dzēst šo plauktu?',
    'shelves_permissions' => 'Plaukta atļaujas',
    'shelves_permissions_updated' => 'Plaukta atļaujas atjauninātas',
    'shelves_permissions_active' => 'Plaukta atļaujas ir aktīvas',
    'shelves_permissions_cascade_warning' => 'Plauktu piekļuves tiesības netiek automātiski piešķirtas tajā esošajām grāmatām. Tas ir tāpēc, ka grāmata var vienlaicīgi atrasties vairākos plauktos. Tomēr piekļuves tiesības var nokopēt uz plauktam pievienotajām grāmatām, izmantojot zemāk atrodamo opciju.',
    'shelves_permissions_create' => 'Plaukta veidošanas tiesības tiek izmantotas tikai, lai kopētu tiesības uz pakārtotajām grāmatām, izmantojot zemāk esošo darbību. Tās nekontrolē iespēju izveidot jaunas grāmatas.',
    'shelves_copy_permissions_to_books' => 'Kopēt grāmatplaukta atļaujas uz grāmatām',
    'shelves_copy_permissions' => 'Kopēt atļaujas',
    'shelves_copy_permissions_explain' => 'Pašreizējās plaukta piekļuves tiesības tiks piemērotas visām tajā esošajām grāmatām. Pirms ieslēgšanas pārliecinieties, ka visas izmaiņas plaukta piekļuves tiesības ir saglabātas.',
    'shelves_copy_permission_success' => 'Plaukta piekļuves tiesības kopētas uz :count grāmatām',

    // Books
    'book' => 'Grāmata',
    'books' => 'Grāmatas',
    'x_books' => ':count grāmata|:count grāmatas',
    'books_empty' => 'Neviena grāmata nav izveidota',
    'books_popular' => 'Populārās grāmatas',
    'books_recent' => 'Nesenās grāmatas',
    'books_new' => 'Jaunas grāmatas',
    'books_new_action' => 'Jauna grāmata',
    'books_popular_empty' => 'Populārākās grāmatas tiks rādītas šeit.',
    'books_new_empty' => 'Pēdējās izveidotās grāmatas tiks rādītas šeit.',
    'books_create' => 'Izveidot jaunu grāmatu',
    'books_delete' => 'Dzēst grāmatu',
    'books_delete_named' => 'Dzēst grāmatu :bookName',
    'books_delete_explain' => 'Šī darbība izdzēsīs grāmatu \':bookName\'. Visas lapas un nodaļas tiks izdzēstas.',
    'books_delete_confirmation' => 'Vai esat pārliecināts, ka vēlaties dzēst šo grāmatu?',
    'books_edit' => 'Labot grāmatu',
    'books_edit_named' => 'Labot grāmatu :bookName',
    'books_form_book_name' => 'Grāmatas nosaukums',
    'books_save' => 'Saglabāt grāmatu',
    'books_permissions' => 'Grāmatas atļaujas',
    'books_permissions_updated' => 'Grāmatas atļaujas atjauninātas',
    'books_empty_contents' => 'Lapas vai nodaļas vēl nav izveidotas šai grāmatai.',
    'books_empty_create_page' => 'Izveidot jaunu lapu',
    'books_empty_sort_current_book' => 'Kārtot šo grāmatu',
    'books_empty_add_chapter' => 'Pievienot nodaļu',
    'books_permissions_active' => 'Grāmatas atļaujas ir aktīvas',
    'books_search_this' => 'Meklēt šajā grāmatā',
    'books_navigation' => 'Grāmatas navigācija',
    'books_sort' => 'Kārtot grāmatas saturu',
    'books_sort_desc' => 'Pārvietojiet nodaļas un lapas grāmatas ietvaros, lai organizētu tās saturu. Var pievienot vēl citas grāmatas, lai vieglāk pārcelt nodaļas un lapas starp grāmatām.',
    'books_sort_named' => 'Kārtot grāmatu :bookName',
    'books_sort_name' => 'Kārtot pēc nosaukuma',
    'books_sort_created' => 'Kārtot pēc izveidošanas datuma',
    'books_sort_updated' => 'Kārtot pēc atjaunināšanas datuma',
    'books_sort_chapters_first' => 'Nodaļas pirmās',
    'books_sort_chapters_last' => 'Nodaļas pēdējās',
    'books_sort_show_other' => 'Rādīt citas grāmatas',
    'books_sort_save' => 'Saglabāt jauno kārtību',
    'books_sort_show_other_desc' => 'Pievienojiet citas grāmatas šeit, lai tās iekļautu kārtošanā un pieļautu vienkāršāku satura organizēšanu starp grāmatām.',
    'books_sort_move_up' => 'Pārvietot uz augšu',
    'books_sort_move_down' => 'Pārvietot uz leju',
    'books_sort_move_prev_book' => 'Pārvietot uz iepriekšējo grāmatu',
    'books_sort_move_next_book' => 'Pārvietot uz nākamo grāmatu',
    'books_sort_move_prev_chapter' => 'Pārvietot uz iepriekšējo nodaļu',
    'books_sort_move_next_chapter' => 'Pārvietot uz nākamo nodaļu',
    'books_sort_move_book_start' => 'Pārvietot uz grāmatas sākumu',
    'books_sort_move_book_end' => 'Pārvietot uz grāmatas beigām',
    'books_sort_move_before_chapter' => 'Pārvietot pirms nodaļas',
    'books_sort_move_after_chapter' => 'Pārvietot pēc nodaļas',
    'books_copy' => 'Kopēt grāmatu',
    'books_copy_success' => 'Grāmata veiksmīgi nokopēta',

    // Chapters
    'chapter' => 'Nodaļa',
    'chapters' => 'Nodaļas',
    'x_chapters' => ':count nodaļa|:count nodaļas',
    'chapters_popular' => 'Populāras nodaļas',
    'chapters_new' => 'Jauna nodaļa',
    'chapters_create' => 'Izveidot jaunu nodaļu',
    'chapters_delete' => 'Dzēst nodaļu',
    'chapters_delete_named' => 'Dzēst nodaļu :chapterName',
    'chapters_delete_explain' => 'Šī darbība dzēsīs nodaļu \':chapterName\'. Visas tajā esošās lapas arī tiks dzēstas.',
    'chapters_delete_confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo nodaļu?',
    'chapters_edit' => 'Labot nodaļu',
    'chapters_edit_named' => 'Labot nodaļu :chapterName',
    'chapters_save' => 'Saglabāt nodaļu',
    'chapters_move' => 'Pārvietot nodaļu',
    'chapters_move_named' => 'Pārvietot nodaļu :chapterName',
    'chapters_copy' => 'Kopēt nodaļu',
    'chapters_copy_success' => 'Nodaļa veiksmīgi nokopēta',
    'chapters_permissions' => 'Nodaļas atļaujas',
    'chapters_empty' => 'Šajā nodaļā nav pievienotu lapu.',
    'chapters_permissions_active' => 'Nodaļas atļaujas ir aktīvas',
    'chapters_permissions_success' => 'Nodaļas atļaujas ir atjauninātas',
    'chapters_search_this' => 'Meklēt šajā nodaļā',
    'chapter_sort_book' => 'Kārtot grāmatu',

    // Pages
    'page' => 'Lapa',
    'pages' => 'Lapas',
    'x_pages' => ':count lapa|:count lapas',
    'pages_popular' => 'Populātas lapas',
    'pages_new' => 'Jauna lapa',
    'pages_attachments' => 'Pielikumi',
    'pages_navigation' => 'Lapas navigācija',
    'pages_delete' => 'Dzēst lapu',
    'pages_delete_named' => 'Dzēst lapu :pageName',
    'pages_delete_draft_named' => 'Dzēst :pageName melnrakstu',
    'pages_delete_draft' => 'Dzēst melnrakstu',
    'pages_delete_success' => 'Lapa ir dzēsta',
    'pages_delete_draft_success' => 'Melnraksts ir dzēsts',
    'pages_delete_warning_template' => 'This page is in active use as a book or chapter default page template. These books or chapters will no longer have a default page template assigned after this page is deleted.',
    'pages_delete_confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo lapu?',
    'pages_delete_draft_confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo melnrakstu?',
    'pages_editing_named' => 'Rediģē lapu :pageName',
    'pages_edit_draft_options' => 'Melnraksta iestatījumi',
    'pages_edit_save_draft' => 'Saglabāt melnrakstu',
    'pages_edit_draft' => 'Labot melnrakstu',
    'pages_editing_draft' => 'Labo melnrakstu',
    'pages_editing_page' => 'Labo lapu',
    'pages_edit_draft_save_at' => 'Melnraksts saglabāts ',
    'pages_edit_delete_draft' => 'Dzēst melnrakstu',
    'pages_edit_delete_draft_confirm' => 'Vai tiešām vēlaties dzēst savas uzmetuma izmaiņas? Visas jūsu izmaiņas kopš pēdējās saglabāšanas pazudīs un redaktors tiks atjaunos ar pēdējo saglabātu lapas saturu.',
    'pages_edit_discard_draft' => 'Atmest malnrakstu',
    'pages_edit_switch_to_markdown' => 'Pārslēgties uz Markdown redaktoru',
    'pages_edit_switch_to_markdown_clean' => '(Iztīrītais saturs)',
    'pages_edit_switch_to_markdown_stable' => '(Stabilais saturs)',
    'pages_edit_switch_to_wysiwyg' => 'Pārslēgties uz WYSIWYG redaktoru',
    'pages_edit_set_changelog' => 'Pievienot izmaiņu aprakstu',
    'pages_edit_enter_changelog_desc' => 'Ievadi nelielu aprakstu par vaiktajām izmaiņām',
    'pages_edit_enter_changelog' => 'Izmaiņu apraksts',
    'pages_editor_switch_title' => 'Pārslēgt redaktoru',
    'pages_editor_switch_are_you_sure' => 'Vai tiešām vēlaties pārslēgt šai lapai lietojamo redaktoru?',
    'pages_editor_switch_consider_following' => 'Pārslēdzot redaktorus, ņemiet vērā:',
    'pages_editor_switch_consideration_a' => 'Pēc saglabāšanas jaunā redaktora izvēle tiks izmantota nākotnē visiem lietotājiem, tai skaitā tiem, kam var nebūt tiesības pašiem mainīt redaktora veidu.',
    'pages_editor_switch_consideration_b' => 'Tas var noteiktos apstākļos novest pie iespējamiem noformējuma un sintakses zudumiem.',
    'pages_editor_switch_consideration_c' => 'Birku vai izmaiņu saraksta ieraksti, kas veikti kopš pēdējās saglabāšanas, nesaglabāsies kopā ar šīm izmaiņām.',
    'pages_save' => 'Saglabāt lapu',
    'pages_title' => 'Lapas virsraksts',
    'pages_name' => 'Lapas nosaukums',
    'pages_md_editor' => 'Redaktors',
    'pages_md_preview' => 'Priekšskatījums',
    'pages_md_insert_image' => 'Ievietot attēlu',
    'pages_md_insert_link' => 'Ievietot vienuma saiti',
    'pages_md_insert_drawing' => 'Ievietot zīmējumu',
    'pages_md_show_preview' => 'Rādīt priekšskatu',
    'pages_md_sync_scroll' => 'Sync preview scroll',
    'pages_drawing_unsaved' => 'Atrasts nesaglabāts attēls',
    'pages_drawing_unsaved_confirm' => 'Unsaved drawing data was found from a previous failed drawing save attempt. Would you like to restore and continue editing this unsaved drawing?',
    'pages_not_in_chapter' => 'Lapa nav nodaļā',
    'pages_move' => 'Pārvietot lapu',
    'pages_copy' => 'Kopēt lapu',
    'pages_copy_desination' => 'Kopijas mērķa vieta',
    'pages_copy_success' => 'Lapa veiksmīgi nokopēta',
    'pages_permissions' => 'Lapas atļaujas',
    'pages_permissions_success' => 'Lapas atļaujas atjauninātas',
    'pages_revision' => 'Revīzijas',
    'pages_revisions' => 'Lapas revīzijas',
    'pages_revisions_desc' => 'Zemāk norādītas visas šīs lapas pagātnes versijas. Jūs varat pārskatīt, salīdzināt un atjaunot vecākas versijas, ja to atļauj jūsu piekļuves tiesības. Pilna lapas vēsture varētu netikt attēlota, jo, atkarībā no sistēmas uzstādījumiem, vecākas versijas varētu būt dzēstas automātiski.',
    'pages_revisions_named' => ':pageName lapas revīzijas',
    'pages_revision_named' => ':pageName lapas revīzija',
    'pages_revision_restored_from' => 'Atjaunots no #:id; :summary',
    'pages_revisions_created_by' => 'Izveidoja',
    'pages_revisions_date' => 'Revīzijas datums',
    'pages_revisions_number' => '#',
    'pages_revisions_sort_number' => 'Versijas numurs',
    'pages_revisions_numbered' => 'Revīzija #:id',
    'pages_revisions_numbered_changes' => 'Revīzijas #:id izmaiņas',
    'pages_revisions_editor' => 'Redaktora veids',
    'pages_revisions_changelog' => 'Izmaiņu žurnāls',
    'pages_revisions_changes' => 'Izmaiņas',
    'pages_revisions_current' => 'Pašreizējā versija',
    'pages_revisions_preview' => 'Priekšskatījums',
    'pages_revisions_restore' => 'Atjaunot',
    'pages_revisions_none' => 'Šai lapai nav revīziju',
    'pages_copy_link' => 'Kopēt saiti',
    'pages_edit_content_link' => 'Pārlekt uz sadaļu redaktorā',
    'pages_pointer_enter_mode' => 'Enter section select mode',
    'pages_pointer_label' => 'Lapas sadaļas uzstādījumi',
    'pages_pointer_permalink' => 'Lapas sadaļas saite',
    'pages_pointer_include_tag' => 'Lapas sadaļas iekļaušanas tags',
    'pages_pointer_toggle_link' => 'Permalink mode, Press to show include tag',
    'pages_pointer_toggle_include' => 'Include tag mode, Press to show permalink',
    'pages_permissions_active' => 'Lapas atļaujas ir aktīvas',
    'pages_initial_revision' => 'Sākotnējā publikācija',
    'pages_references_update_revision' => 'Automātiska iekšējo saišu atjaunināšana',
    'pages_initial_name' => 'Jauna lapa',
    'pages_editing_draft_notification' => 'Jūs pašlaik veicat izmaiņas melnrakstā, kurš pēdējo reizi ir saglabāts :timeDiff.',
    'pages_draft_edited_notification' => 'Šī lapa ir tikusi atjaunināta. Šo melnrakstu ieteicams atmest.',
    'pages_draft_page_changed_since_creation' => 'Šī lapa ir izmainīta kopš šī uzmetuma izveidošanas. Ieteicams šo uzmetumu dzēst, lai netiktu pazaudētas veiktās izmaiņas.',
    'pages_draft_edit_active' => [
        'start_a' => ':count lietotāji pašlaik veic izmaiņas šajā lapā',
        'start_b' => ':userName veic izmaiņas šajā lapā',
        'time_a' => 'kopš šī lapa pēdējo reizi ir atjaunināta',
        'time_b' => 'pēdējās :minCount minūtēs',
        'message' => ':start :time. Esat uzmanīgi, lai neaizstātu viens otra izmaiņas!',
    ],
    'pages_draft_discarded' => 'Draft discarded! The editor has been updated with the current page content',
    'pages_draft_deleted' => 'Draft deleted! The editor has been updated with the current page content',
    'pages_specific' => 'Konkrēta lapa',
    'pages_is_template' => 'Lapas šablons',

    // Editor Sidebar
    'toggle_sidebar' => 'Pārslēgt sānjoslu',
    'page_tags' => 'Lapas birkas',
    'chapter_tags' => 'Nodaļas birkas',
    'book_tags' => 'Grāmatas birkas',
    'shelf_tags' => 'Plauktu birkas',
    'tag' => 'Birka',
    'tags' =>  'Birkas',
    'tags_index_desc' => 'Tags can be applied to content within the system to apply a flexible form of categorization. Tags can have both a key and value, with the value being optional. Once applied, content can then be queried using the tag name and value.',
    'tag_name' =>  'Birkas nosaukums',
    'tag_value' => 'Birkas papildvērtība (neobligāta)',
    'tags_explain' => "Pievieno birkas, lai precīzāk grupētu saturu.\n Tu vari pievienot papildus vērtību birkai vēl precīzākai grupēšanai.",
    'tags_add' => 'Pievienot vēlvienu birku',
    'tags_remove' => 'Noņemt šo birku',
    'tags_usages' => 'Kopējais birku lietojums',
    'tags_assigned_pages' => 'Pievienotas lapām',
    'tags_assigned_chapters' => 'Pievienotas nodaļām',
    'tags_assigned_books' => 'Pievienotas grāmatām',
    'tags_assigned_shelves' => 'Pievienotas plauktiem',
    'tags_x_unique_values' => ':count unikālas vērtības',
    'tags_all_values' => 'Visas vērtības',
    'tags_view_tags' => 'Skatīt birkas',
    'tags_view_existing_tags' => 'Skatīt esošās birkas',
    'tags_list_empty_hint' => 'Birkas var pievienot lapas redaktora sānu kolonnā vai rediģējot grāmatas, nodaļas vai plaukta detaļas.',
    'attachments' => 'Pielikumi',
    'attachments_explain' => 'Augšupielādējiet dažus failus vai pievieno saites, kas tiks parādītas jūsu lapā. Tie būs redzami lapas sānjoslā.',
    'attachments_explain_instant_save' => 'Izmaiņas šeit tiek saglabātas nekavējoties.',
    'attachments_upload' => 'Augšupielādēt failu',
    'attachments_link' => 'Pievienot saiti',
    'attachments_upload_drop' => 'Alternatively you can drag and drop a file here to upload it as an attachment.',
    'attachments_set_link' => 'Uzstādīt saiti',
    'attachments_delete' => 'Vai tiešām vēlaties dzēst šo pielikumu?',
    'attachments_dropzone' => 'Ievelciet failus šeit, lai augšupielādētu',
    'attachments_no_files' => 'Neviens fails nav augšupielādēts',
    'attachments_explain_link' => 'Ja nevēlaties augšupielādēt failu, varat pievienot saiti. Tā var būt saite uz citu lapu vai saite uz failu mākonī.',
    'attachments_link_name' => 'Saites nosaukums',
    'attachment_link' => 'Pielikuma saite',
    'attachments_link_url' => 'Saite uz failu',
    'attachments_link_url_hint' => 'Web lapas vai faila URL',
    'attach' => 'Pievienot',
    'attachments_insert_link' => 'Pievienot pielikuma saiti lapai',
    'attachments_edit_file' => 'Rediģēt failu',
    'attachments_edit_file_name' => 'Faila nosaukums',
    'attachments_edit_drop_upload' => 'Ievelc failus vai spied šeit, lai augšupielādētu vai aizstātu failus',
    'attachments_order_updated' => 'Pielikuma secība ir atjaunināta',
    'attachments_updated_success' => 'Pielikuma informācja ir atjaunināta',
    'attachments_deleted' => 'Pielikums dzēsts',
    'attachments_file_uploaded' => 'Fails veiksmīgi augšupielādēts',
    'attachments_file_updated' => 'Fails veiksmīgi atjaunināts',
    'attachments_link_attached' => 'Hipersaite veismīgi pievienota lapai',
    'templates' => 'Šabloni',
    'templates_set_as_template' => 'Šī lapa ir šablons',
    'templates_explain_set_as_template' => 'Jūs varat iestatīt šo lapu kā veidni, lai tās saturs tiktu izmantots, veidojot citas lapas. Citi lietotāji varēs izmantot šo veidni, ja viņiem būs atļauja piekļūt šai lapai.',
    'templates_replace_content' => 'Aizstāt lapas saturu',
    'templates_append_content' => 'Pievienot lapas saturam (beigās)',
    'templates_prepend_content' => 'Pievienot lapas saturam (sākumā)',

    // Profile View
    'profile_user_for_x' => 'Lietotājs jau :time',
    'profile_created_content' => 'Izveidotais saturs',
    'profile_not_created_pages' => ':userName nav izveidojis lapas',
    'profile_not_created_chapters' => ':userName nav izveidojis nodalas',
    'profile_not_created_books' => ':userName nav izveidojis grāmatas',
    'profile_not_created_shelves' => ':userName nav izveidojis grāmatplauktus',

    // Comments
    'comment' => 'Komentārs',
    'comments' => 'Komentāri',
    'comment_add' => 'Pievienot komentāru',
    'comment_placeholder' => 'Pievieno komentāru',
    'comment_count' => '{0} Nav komentāru |{1} 1 Komentārs|[2,*] :count Komentāri',
    'comment_save' => 'Saglabāt komentāru',
    'comment_new' => 'Jauns komentārs',
    'comment_created' => 'komentējis :createDiff',
    'comment_updated' => ':username atjauninājis pirms :updateDiff',
    'comment_updated_indicator' => 'Atjaunots',
    'comment_deleted_success' => 'Komentārs ir dzēsts',
    'comment_created_success' => 'Komentārs ir pievienots',
    'comment_updated_success' => 'Komentārs ir atjaunināts',
    'comment_delete_confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo komentāru?',
    'comment_in_reply_to' => 'Atbildēt uz :commentId',
    'comment_editor_explain' => 'Here are the comments that have been left on this page. Comments can be added & managed when viewing the saved page.',

    // Revision
    'revision_delete_confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo revīziju?',
    'revision_restore_confirm' => 'Vai tiešām vēlaties atjaunot šo revīziju? Pašreizējais lapas saturs tiks aizvietots.',
    'revision_cannot_delete_latest' => 'Nevar dzēst pašreizējo revīziju.',

    // Copy view
    'copy_consider' => 'Kopējot saturu, lūdzu ņemiet vērā tālāk minēto.',
    'copy_consider_permissions' => 'Pielāgoti tiesību uzstādījumi netiks nokopēti.',
    'copy_consider_owner' => 'Jūs kļūsiet par visa kopētā satura īpašnieku.',
    'copy_consider_images' => 'Lapas attēlu faili netiks kopēti un sākotnējie attēli saglabās savu saistību ar lapu, kurai tie tika sākotnēji pievienoti.',
    'copy_consider_attachments' => 'Lapai pievienotie faili netiks nokopēti.',
    'copy_consider_access' => 'Atrašanās vietas, īpašnieka vai piekļuves tiesību izmaiņas var padarīt šo saturu pieejamu citiem, kam iepriekš nav dota piekļuve.',

    // Conversions
    'convert_to_shelf' => 'Pārveidot par plauktu',
    'convert_to_shelf_contents_desc' => 'Jūs varat pārveidot šo grāmatu par jaunu plauktu ar to pašu saturu. Nodaļas šajā grāmatā tiks pārveidots par jaunām grāmatām. Ja šī grāmata satur atsevišķas lapas, kas neietilpst nevienā nodaļā, tiks izveidota atsevišķa grāmata ar šādām lapām, kas tiks ievietota jaunajā plauktā.',
    'convert_to_shelf_permissions_desc' => 'Any permissions set on this book will be copied to the new shelf and to all new child books that don\'t have their own permissions enforced. Note that permissions on shelves do not auto-cascade to content within, as they do for books.',
    'convert_book' => 'Pārveidot grāmatu',
    'convert_book_confirm' => 'Vai tiešām vēlaties pārveidot šo grāmatu?',
    'convert_undo_warning' => 'To nav iespiejāms vienkārši atcelt.',
    'convert_to_book' => 'Pārveidot par grāmatu',
    'convert_to_book_desc' => 'Jūs varat pārveidot šo nodaļu par grāmatu ar tādu pašu saturu. Visas piekļuves tiesības, kas uzstādītas šai nodaļai, tiks kopētas uz jauno grāmatu, taču piekļuves tiesības, kas tiek uzstādītas pašreizējai grāmatai kopumā, netiks kopētas, tā kā ir iespējams, ka jaunajai grāmati var būt citas piekļuves tiesības.',
    'convert_chapter' => 'Pārveidot nodaļu',
    'convert_chapter_confirm' => 'Vai tiešām vēlaties pārveidot šo nodaļu?',

    // References
    'references' => 'Atsauces',
    'references_none' => 'Uz šo vienumu nav atrasta neviena atsauce.',
    'references_to_desc' => 'Listed below is all the known content in the system that links to this item.',

    // Watch Options
    'watch' => 'Vērot',
    'watch_title_default' => 'Noklusētie uzstādījumi',
    'watch_desc_default' => 'Revert watching to just your default notification preferences.',
    'watch_title_ignore' => 'Ignorēt',
    'watch_desc_ignore' => 'Ignorēt visus paziņojumus, tai skaitā arī tādus, kas uzstādīti lietotāja uzstādījumos.',
    'watch_title_new' => 'Jaunas lapas',
    'watch_desc_new' => 'Notify when any new page is created within this item.',
    'watch_title_updates' => 'Visi lapu atjauninājumi',
    'watch_desc_updates' => 'Paziņot par visām jaunām lapām un lapu izmaiņām.',
    'watch_desc_updates_page' => 'Paziņot par visām lapu izmaiņām.',
    'watch_title_comments' => 'Visi lapu atjauninājumi un komentāri',
    'watch_desc_comments' => 'Paziņot par visām jaunām lapām, lapu izmaiņām un jauniem komentāriem.',
    'watch_desc_comments_page' => 'Paziņot par lapu izmaiņām un jauniem komentāriem.',
    'watch_change_default' => 'Izmainīt noklusētos paziņojumu uzstādījumus',
    'watch_detail_ignore' => 'Ignorēt paziņojumus',
    'watch_detail_new' => 'Watching for new pages',
    'watch_detail_updates' => 'Watching new pages and updates',
    'watch_detail_comments' => 'Watching new pages, updates & comments',
    'watch_detail_parent_book' => 'Watching via parent book',
    'watch_detail_parent_book_ignore' => 'Ignoring via parent book',
    'watch_detail_parent_chapter' => 'Watching via parent chapter',
    'watch_detail_parent_chapter_ignore' => 'Ignoring via parent chapter',
];
