<template>
  <div>
    <b-card>
      <b-container class="text-dark">
        <h1 class="col-12 text-info">Telzir</h1>
        <hr>

        <div class="col-12">
          <b-form @submit.stop.prevent="onSubmit">
            <b-row>
              <b-col cols="sm-12 col-md-3">
                <b-form-select
                  id="example-input-2"
                  name="example-input-2"
                  v-model="$v.form.from.$model"
                  :options="foods"
                  :state="validateState('from')"
                  aria-describedby="input-2-live-feedback"
                >
                  <template v-slot:first>
                    <b-form-select-option :value="null" disabled>Origem</b-form-select-option>
                  </template>
                </b-form-select>

                <b-form-invalid-feedback id="input-2-live-feedback">Campo obrigatório.</b-form-invalid-feedback>
              </b-col>

              <b-col cols="sm-12 col-md-3">
                <b-form-select
                  id="example-input-2"
                  name="example-input-2"
                  v-model="$v.form.to.$model"
                  :options="foods"
                  :state="validateState('to')"
                  aria-describedby="input-2-live-feedback"
                >
                  <template v-slot:first>
                    <b-form-select-option :value="null" disabled>Destino</b-form-select-option>
                  </template>
                </b-form-select>

                <b-form-invalid-feedback id="input-2-live-feedback">Campo obrigatório.</b-form-invalid-feedback>
              </b-col>

              <b-col cols="sm-12 col-md-3">
                <b-form-input
                  placeholder="Duração (min) ex: 45"
                  id="example-input-3"
                  name="example-input-3"
                  type="number"
                  v-model="$v.form.duration.$model"
                  :state="validateState('duration')"
                  aria-describedby="input-3-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback
                  id="input-3-live-feedback"
                >Valor mínimo aceito é de 1 minuto.</b-form-invalid-feedback>
              </b-col>

              <b-col cols="sm-12 col-md-3">
                <b-form-group id="example-input-group-4" label-for="example-input-3">
                  <b-button type="submit" block variant="info">Calcular</b-button>
                </b-form-group>
              </b-col>
            </b-row>
          </b-form>
        </div>
      </b-container>
    </b-card>
  </div>
</template>

<style>
  body {
    padding: 1rem;
  }
</style>

<script>
import { validationMixin } from 'vuelidate'
import { required, minValue } from 'vuelidate/lib/validators'

export default {
  mixins: [validationMixin],
  data () {
    return {
      foods: [
        { value: null, text: 'Choose...' },
        { value: 'apple', text: 'Apple' },
        { value: 'orange', text: 'Orange' }
      ],
      form: {
        from: null,
        to: null,
        duration: null
      }
    }
  },
  validations: {
    form: {
      from: {
        required
      },
      to: {
        required
      },
      duration: {
        required,
        minValue: minValue(5)
      }
    }
  },
  methods: {
    validateState (name) {
      const { $dirty, $error } = this.$v.form[name]
      return $dirty ? !$error : null
    },
    onSubmit () {
      this.$v.form.$touch()
      if (this.$v.form.$anyError) {
        return
      }

      alert('Form submitted!')
    }
  }
}
</script>
