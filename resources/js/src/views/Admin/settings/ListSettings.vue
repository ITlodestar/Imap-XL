<template>
  <v-card flat class="mt-5 text-center">
    <v-data-table 
      :headers="headers" 
      :items="settings" 
      item-key="full_name" 
      class="table-rounded"
      > 
      <template #[`item.variable`]="{ item }">
        <div class="d-flex align-center justify-center  ">
          <v-chip  class="font-weight-medium" >
            {{ item.variable }}
          </v-chip> 
        </div>
      </template>
      <template #[`item.value`]="{ item }">
        <div class="d-flex align-center justify-center  ">
          <v-chip :class = "edit_status !== item.id ? 'd-block' :'d-none'"  class="font-weight-medium" color = "info">
            {{ item.value }}
          </v-chip> 
          <v-text-field 
            :class = "edit_status === item.id ? 'd-block' :'d-none'"
            placeholder="Input Number"
            type="number"
            style="max-width: 150px;"
            v-model="edit_value"
          ></v-text-field>
        </div>
      </template>
      <template #[`item.editbtn`]="{ item }">
        <div class="d-flex justify-center">
          <v-btn 
            :class = "edit_status !== item.id ? 'd-block' :'d-none'" 
            variant="flat" 
            color="info" 
            @click="EditSettingValue(item.id)"
            > 
            Edit
          </v-btn>
          <div 
            :class = "edit_status === item.id ? 'd-flex' :'d-none'" 
            >
            <v-btn 
              variant="flat" 
              color="success" 
              class="mr-2"
              @click="Save(item.id)">
              Save
            </v-btn>
            <v-btn 
              variant="flat" 
              color="error" 
              @click="Cancel(item.id)">
              Cancel
            </v-btn>
          </div>
        </div>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
// eslint-disable-next-line object-curly-newline

import { ref } from '@vue/composition-api'

export default {
  props: {
    settings: Array,
    SaveSettingValue: Function
  },
  setup(props, context) {
    let edit_status = ref(-1);
    let edit_value = ref(0);
    const EditSettingValue = (edit_id) => {
      edit_status.value = edit_id;
    }
    const Cancel = () => {
      edit_status.value = -1;
      edit_value.value = 0;
    }
    const Save = ( id ) => { 
      if(edit_value.value > 0) {
        console.log("save");
        context.emit("SaveSettingValue", { id : id , value: edit_value.value});
      }
      Cancel();
    }
    return {
      // current_edit,
      edit_value,
      edit_status,
      EditSettingValue,
      Cancel,
      Save,
      headers: [
        { text: 'Id', value: 'id', align: 'center', sortable: false, },
        { text: 'Variable', value: 'variable', align: 'center' },
        { text: 'Value', value: 'value' , align: 'center'},
        { text: '', value: 'editbtn', align: 'left' }
      ]
    }
  },
}
</script>
