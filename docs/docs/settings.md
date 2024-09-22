# System settings
**CORE**

| Key                         | Value                  | Description                                                      |
 |-----------------------------|------------------------|------------------------------------------------------------------| 
| allow_multiple_emails       | no                     | so that each user has their own email address                    |
| friendly_alias_realtime     | yes                    | real-time alias generation                                       |
| friendly_urls               | yes                    | enabling friendly URLs                                           |
| friendly_urls_strict        | yes                    | strict regime                                                    |
| publish_default             | yes                    | by default, the resource is created published                    |
| use_alias_path              | yes                    | so that the URL considers the parent's alias, not its frozen URL |
| resource_tree_node_tooltip  | alias                  | so you can figure out what the address of the resource is        |
| locale                      | en_US.utf8             | locale setting                                                   |
| request_method_strict       | yes                    | disabling page access by id                                      |
| unauthorized_page           | id 403                 | ID of the 403 page                                               |
| error_page                  | id 404                 | ID of the 404 page                                               |
| error_page_header           | HTTP/1.0 404 Not Found | header for a 404 error                                           |
| site_unavailable_page       | id 503                 | ID of the 503 page                                               |
| log_deprecated              | no                     | deprecated functions in the error log                            |


**PDOTOOLS**

| Key                    | Value        | Description            |
 |------------------------|--------------|------------------------|
| pdotools_fenom_default | yes          | use of Fenom in chunks |
| pdotools_fenom_modx    | yes          | enable MODX in Fenom   |
| pdotools_fenom_parser  | yes          | use of Fenom on pages  |
| pdotools_elements_path | {core_path}/ | to load file elements  |


**TINYMCERTE**

| Key                        | Value                                                                                                                                                                                          | Description     |
 |----------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------|
| tinymcerte.plugins         | advlist autolink lists modximage charmap print preview anchor visualblocks searchreplace code fullscreen insertdatetime media table contextmenu paste modxlink textcolor colorpicker template  | Plugins         |
| tinymcerte.toolbar1        | undo redo \| styleselect \| backcolor forecolor bold italic \| alignleft aligncenter alignright alignjustify \| bullist numlist outdent indent \| link image \| template                       | Toolbar 1       |
| tinymcerte.external_config | {assets_path}components/tinymcerte/js/external-config.json                                                                                                                                     | External config |

**BOILERPLATE**

| Key                                | Value | Description                              |
 |------------------------------------|------|------------------------------------------|
| boilerplate_compress_output_html   | yes  | compresses html output for Google        |
| boilerplate_hide_vtabs_tv          | no   | hides the vertical tab for tv            |
| boilerplate_menu_description       | no   | hides component descriptions in the menu |