# config valid only for Capistrano 3.1
# lock '3.2.1'

set :application, 'clastic_marketing'
set :repo_url, 'git@github.com:Clastic/clastic-marketing.git'
set :deploy_to, '/var/apps/clastic/marketing'
set :branch, 'clastic'

set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs,  %w{web/uploads}
set :keep_releases, 2

namespace :deploy do
  after :updating, :make_install do
    on roles(:app) do |host|
      within release_path do
        execute :chmod, '-R 777 app/logs app/cache'
        execute :setfacl, '-R -m u:"www-data":rwX -m u:`whoami`:rwX app/cache app/logs'
        execute :setfacl, '-dR -m u:"www-data":rwX -m u:`whoami`:rwX app/cache app/logs'
        if test "[ -d #{current_path.join('vendor')} ]"
          execute :cp, "-R", current_path.join('vendor'), release_path.join('vendor')
        end
        if test "[ -d #{current_path.join('node_modules')} ]"
          execute :cp, "-R", current_path.join('node_modules'), release_path.join('node_modules')
        end
        if test "[ -d #{current_path.join('web/vendor')} ]"
          execute :cp, "-R", current_path.join('web/vendor'), release_path.join('web/vendor')
        end
        execute :make, "update"
      end
    end
  end
end
