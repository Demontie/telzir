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
                <label for="example-input-2" class="font-weight-bold">Origem</label>
                <b-form-select
                  id="example-input-2"
                  name="example-input-2"
                  v-model="$v.form.from.$model"
                  :options="areas"
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
                <label for="example-input-3" class="font-weight-bold">Destino</label>
                <b-form-select
                  id="example-input-3"
                  name="example-input-3"
                  v-model="$v.form.to.$model"
                  :options="areas"
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
                <label for="example-input-4" class="font-weight-bold">Plano</label>
                <b-form-select
                  id="example-input-4"
                  name="example-input-4"
                  v-model="$v.form.plan.$model"
                  :options="plans"
                  :state="validateState('plan')"
                  aria-describedby="input-2-live-feedback"
                >
                  <template v-slot:first>
                    <b-form-select-option :value="null" disabled>Plano</b-form-select-option>
                  </template>
                </b-form-select>

                <b-form-invalid-feedback id="input-2-live-feedback">Campo obrigatório.</b-form-invalid-feedback>
              </b-col>

              <b-col cols="sm-12 col-md-3">
                <label for="example-input-5" class="font-weight-bold">Duração (min)</label>
                <b-form-input
                  placeholder="ex: 45"
                  id="example-input-5"
                  name="example-input-5"
                  type="number"
                  v-model="$v.form.duration.$model"
                  :state="validateState('duration')"
                  aria-describedby="input-3-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback
                  id="input-3-live-feedback"
                >Valor mínimo aceito é de 1 minuto.</b-form-invalid-feedback>
              </b-col>
            </b-row>

            <br>

            <b-button type="submit" variant="info" class="font-weight-bold">Calcular</b-button>
          </b-form>
        </div>

        <br>

        <div class="col-12">
          <b-overlay :show="showLoad" rounded="sm">
            <b-table
              sort-icon-left
              striped
              bordered
              fixed
              responsive="sm"
              head-variant="dark"
              :items="row"
              :fields="fields"
            >
            </b-table>
          </b-overlay>
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
import { get, post } from '@/components/infrastructure/request'

export default {
  name: 'Home',
  mixins: [validationMixin],
  data () {
    return {
      showLoad: false,
      areas: [],
      plans: [],
      form: {
        from: null,
        to: null,
        duration: null,
        plan: null
      },
      row: [],
      fields: [
        {
          key: 'from',
          label: 'Origem',
          sortable: true
        },
        {
          key: 'to',
          label: 'Destino',
          sortable: true
        },
        {
          key: 'duration',
          label: 'Tempo',
          sortable: true
        },
        {
          key: 'plan',
          label: 'Plano FaleMais',
          sortable: true
        },
        {
          key: 'withPlan',
          label: 'Com FaleMais',
          sortable: true
        },
        {
          key: 'withoutPlan',
          label: 'Sem FaleMais',
          sortable: true
        }
      ]
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
      plan: {
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
      this.showLoad = true
      if (!this.$v.form.$anyError) {
        this.row = []
        post('calls-values', this.form)
          .then(res => {
            const planValue = this.formatCurrency(res.withPlan)
            const withoutPlanValue = this.formatCurrency(res.withoutPlan)

            this.row.push({
              from: res.from,
              to: res.to,
              duration: res.duration,
              plan: res.plan,
              withPlan: planValue,
              withoutPlan: withoutPlanValue
            })
          })
      }

      this.showLoad = false
    },
    getAreaCode () {
      get('areas')
        .then(res => {
          res.forEach(item => {
            this.areas.push({
              value: item.id,
              text: item.code
            })
          })
        })
    },
    getPlan () {
      get('plans')
        .then(res => {
          res.forEach(item => {
            this.plans.push({
              value: item.id,
              text: item.name
            })
          })
        })
    },
    formatCurrency (value) {
      return value.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
      })
    }
  },
  created () {
    this.getAreaCode()
    this.getPlan()
  }
}
</script>
