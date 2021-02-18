<?php
function render_input($name, $label = '', $value = '', $type = 'text', $form_group_class = '', $input_class = '', $input_attrs = [], $form_group_attr = [])
{
    $input = '';
    $_form_group_attr = '';
    $_input_attrs = '';

    foreach ($input_attrs as $key => $val) {

        $_input_attrs .= $key . '=' . '"' . $val . '"';
    }

    foreach ($form_group_attr as $key => $val) {

        $_form_group_attr .= $key . '=' . '"' . $val . '"';
    }
    if (!empty($form_group_class)) {
        $form_group_class = ' ' . $form_group_class;
    }
    if (!empty($input_class)) {
        $input_class = ' ' . $input_class;
    }

    $input .= '<div class="form-group ' . $form_group_class . '" ' . $_form_group_attr . '>';

    if ($label != '') {
        $input .= '<label for="' . $name . '" class="control-label">' . $label . '</label>';
    }

    $input .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" class="form-control' . $input_class . '" ' . $_input_attrs . ' value="' . $value . '">';
    $input .= '</div>';
    return $input;
}
function render_textarea($name, $label = '', $value = '')
{
    $textarea = "<div class='form-group'>
                        <label for='$name'>$label</label>
                        <textarea name='$name' class='form-control' id='$name' rows='4'>$value</textarea>
                      </div>";
    return $textarea;
}
function render_select($name, $options, $label = '', $selected = '', $form_group_class = '', $select_class = '')
{
    $select = '';

    if (!empty($select_class)) {
        $select_class = ' ' . $select_class;
    }
    if (!empty($form_group_class)) {
        $form_group_class = ' ' . $form_group_class;
    }
    $select .= '<div class="form-group' . $form_group_class . '">';
    if ($label != '') {
        $select .= '<label for="' . $name . '" class="control-label">' . $label . '</label>';
    }
    $select .= "<select id='$name' name='$name' class='form-control full-width $select_class dja-select' data-init-plugin='select2'>";
    foreach ($options as $key => $val) {
        $_selected = '';
        if ($selected != '') {
            if ($selected == $key) {
                $_selected = ' selected';
            }
        }

        $select .= '<option value="' . $key . '"' . $_selected . '>' . $val . '</option>';
    }
    $select .= '</select>';
    $select .= '</div>';
    return $select;
}
function render_form_role($arrayModul, $dataRole = null)
{
    $output = '';
    foreach ($arrayModul as $amk => $amv) {
        $_view = '';
        $_add = '';
        $_edit = '';
        $_del = '';
        if ($dataRole) {
            if (array_key_exists($amk, $dataRole)) {
                if (in_array('view', $dataRole[$amk])) {
                    $_view = 'checked="true"';
                }
                if (in_array('add', $dataRole[$amk])) {
                    $_add = 'checked="true"';
                }
                if (in_array('edit', $dataRole[$amk])) {
                    $_edit = 'checked="true"';
                }
                if (in_array('del', $dataRole[$amk])) {
                    $_del = 'checked="true"';
                }
            }
        }
        $output .= '<tr>
                        <td>
                            ' . $amv . '
                        </td>
                        <td>
                            <center>
                                <input type="checkbox" class="form-check-input" name="permission[' . $amk . '][view]" ' . $_view . ' value="1">
                            </center>
                        </td>
                        <td>
                            <center>
                                <input type="checkbox" class="form-check-input" name="permission[' . $amk . '][add]" ' . $_add . ' value="1">
                            </center>
                        </td>
                        <td>
                            <center>
                                <input type="checkbox" class="form-check-input" name="permission[' . $amk . '][edit]" ' . $_edit . ' value="1">
                            </center>
                        </td>
                        <td>
                            <center>
                                <input type="checkbox" class="form-check-input" name="permission[' . $amk . '][del]" ' . $_del . ' value="1">
                            </center>
                        </td>
                    </tr>';
    }
    return $output;
}
