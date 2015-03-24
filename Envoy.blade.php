@servers(['vm' => '-p 2222 vagrant@127.0.0.1', 'production' => 'iign@iign.webfactional.com'])


@task('sync_to_server', ['on' => 'vm'])
    cd Projects/portada/site
    gulp
    cd ..
    sh deploy.sh
@endtask


@task('optimize', ['on' => 'production'])
	cd /home/iign/webapps/portada_beta
    php55 artisan optimize
@endtask


@macro('deploy')
    sync_to_server
    optimize
@endmacro